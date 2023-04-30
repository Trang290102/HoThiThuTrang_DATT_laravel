<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Link;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    #GET:admin/page, admin/page/index
    public function index()
    {
       

        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
        return view('backend.page.index', compact('list_page'));
    }
    #GET:admin/page/trash
    public function trash()
    {
       

        $list_page = Post::where([['status', '=', 0], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
        return view('backend.page.trash', compact('list_page'));
    }

    #GET: admin/page/create
    public function create()
    {
       
        return view('backend.page.create');
    }


    public function store(PageStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $page = new Post; //tạo mới một page
        $page->title = $request->title;
        $page->slug = Str::slug($page->title = $request->title, '-');
        $page->detail = $request->detail;
        $page->type = 'page';
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->status = $request->status;
        $page->created_at = date('Y-m-d H:i:s');
        $page->created_by = $user_id;
        //upload image
        if ($request->has('images')) {
            $path_dir = "public/images/page/";
            $file =  $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = $page->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $page->images = $filename;
        }
        //end upload
        if ($page->save()) {
            $link = new Link();
            $link->slug = $page->slug;
            $link->table_id = $page->id;
            $link->type = 'page';
            $link->save();
            return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Thêm trang đơn thành công!']);
        }
        return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm trang đơn không thành công!']);
    }

    public function show(string $id)
    {
       

        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.page.show', compact('page'));
    }

    public function edit(string $id)
    {
       

        $page = Post::find($id);
        return view('backend.page.edit', compact('page'));
    }

    public function update(PageUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $page = Post::find($id); //lấy mẫu tin
        $page->slug = Str::slug($page->title = $request->title, '-');

        //upload image
        if ($request->has('images')) {
            $path_dir = "public/images/page/";
            if (File::exists(($path_dir . $page->images))) {
                File::delete(($path_dir . $page->images));
            }
            $file =  $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = $page->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $page->images = $filename;
        }
        //end upload
        $page->title = $request->title;
        $page->detail = $request->detail;
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = $user_id;
        if ($page->save()) {
            if ($link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first()) {
                $link->slug = $page->slug;
                $link->save();
            }
            return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật trang đơn thành công!']);
        }
        return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật trang đơn không thành công!']);
    }

    #GET:admin/page/destroy/{id}
    public function destroy(string $id)
    {
        $page = Post::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/page/";
        $path_image_delete = $path_dir . $page->images;
        if ($page == null) {
            return redirect()->route('page.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($page->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            //xoa link
            if ($link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first()) {
                $link->delete();
            }
            return redirect()->route('page.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa trang đơn thành công!']);
        }
        return redirect()->route('page.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa trang đơn không thành công!']);
    }
    #GET:admin/page/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $page->status = ($page->status == 1) ? 2 : 1;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = $user_id;
        $page->save();
        return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/page/delete/{id}
    public function delete($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $page->status = 0;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = $user_id;
        $page->save();
        return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/page/restore/{id}
    public function restore($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('page.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $page->status = 2;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = $user_id;
        $page->save();
        return redirect()->route('page.trash')->with('message', ['type' => 'success', 'msg' => ' Khôi phục trang đơn thành công!']);
    }
}
