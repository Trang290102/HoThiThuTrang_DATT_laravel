<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Link;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;


class CategoryController extends Controller
{
    #GET:admin/category, admin/category/index
    public function index()
    {
        $list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.category.index', compact('list_category'));
    }
    #GET:admin/category/trash
    public function trash()
    {
        $list_category = Category::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.category.trash', compact('list_category'));
    }

    #GET: admin/category/create
    public function create()
    {
        $list_category = Category::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_category as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.category.create', compact('html_parent_id', 'html_sort_order'));
    }


    public function store(CategoryStoreRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = new Category; //tạo mới mẫu tin
        $category->name = $request->name;
        $category->slug = Str::slug($category->name = $request->name, '-');
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order + 1;
        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = 1;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/category/";
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $category->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $category->image = $filename;
        }
        //end upload
        if ($category->save()) {
            $link = new Link();
            $link->slug = $category->slug;
            $link->table_id = $category->id;
            $link->type = 'category';
            $link->save();
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thêm danh mục thành công!']);
        }
        return redirect()->route('category.index')->with('message', ['type' => 'dangers', 'msg' => 'Thêm danh mục không thành công!']);
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        $list_category = Category::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_category as $item) {
            if ($category->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            if ($category->sort_order == $item->id) {
                $html_sort_order .= '<option selected value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.category.edit', compact('category', 'html_parent_id', 'html_sort_order'));
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::find($id); //lấy mẫu tin
        $category->slug = Str::slug($category->name = $request->name, '-');

        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/category/";
            if (File::exists(($path_dir . $category->image))) {
                File::delete(($path_dir . $category->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $category->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $category->image = $filename;
        }
        //end upload        
        $category->name = $request->name;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->created_by = 1;
        if ($category->save()) {
            if ($link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first()) {
                $link->slug = $category->slug;
                $link->save();
            }
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật danh mục thành công!']);
        }
        return redirect()->route('category.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật danh mục không thành công!']);
    }

    #GET:admin/category/destroy/{id}
    public function destroy(string $id)
    {
        $category = Category::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/category/";
        $path_image_delete = $path_dir . $category->image;
        if ($category == null) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($category->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            //xoa link
            if ($link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first()) {
                $link->delete();
            }
            return redirect()->route('category.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa danh mục thành công!']);
        }
        return redirect()->route('category.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa danh mục không thành công!']);
    }
    #GET:admin/category/status/{id}
    public function status($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $category->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/category/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/category/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->save();
        return redirect()->route('category.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
