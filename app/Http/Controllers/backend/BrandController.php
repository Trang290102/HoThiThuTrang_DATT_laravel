<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Link;
use App\Models\Brand;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    #GET:admin/brand, admin/brand/index
    public function index()
    {
        $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.brand.index', compact('list_brand'));
    }
    #GET:admin/brand/trash
    public function trash()
    {
        $list_brand = Brand::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.brand.trash', compact('list_brand'));
    }

    #GET: admin/brand/create
    public function create()
    {
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_sort_order = '';

        foreach ($list_brand as $item) {
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.brand.create', compact('html_sort_order'));
    }

    public function store(BrandStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $brand = new Brand; //tạo mới mẫu tin
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->sort_order = $request->sort_order + 1;
        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/brand/";
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $brand->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $brand->image = $filename;
        }
        //end upload
        if ($brand->save()) {
            $link = new Link();
            $link->slug = $brand->slug;
            $link->table_id = $brand->id;
            $link->type = 'brand';
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thương hiệu thành công!']);
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'dangers', 'msg' => 'Thêm thương hiệu không thành công!']);
    }

    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.brand.show', compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::find($id);
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_sort_order = '';

        foreach ($list_brand as $item) {
            if ($brand->sort_order == $item->id) {
                $html_sort_order .= '<option selected value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.brand.edit', compact('brand', 'html_sort_order'));
    }

    public function update(BrandUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $brand = Brand::find($id); //lấy mẫu tin
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->sort_order = $request->sort_order;
        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/brand/";
            if (File::exists(($path_dir . $brand->image))) {
                File::delete(($path_dir . $brand->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $brand->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $brand->image = $filename;
        }
        //end upload
        if ($brand->save()) {
            if ($link = Link::where([['type', '=', 'brand'], ['table_id', '=', $id]])->first()) {
                $link->slug = $brand->slug;
                $link->save();
            }
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thương hiệu thành công!']);
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật thương hiệu không thành công!']);
    }

    #GET:admin/brand/destroy/{id}
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/brand/";
        $path_image_delete = $path_dir . $brand->image;
        if ($brand == null) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($brand->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            //xoa link
            if ($link = Link::where([['type', '=', 'brand'], ['table_id', '=', $id]])->first()) {
                $link->delete();
            }
            return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thương hiệu thành công!']);
        }
        return redirect()->route('brand.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa thương hiệu không thành công!']);
    }
    #GET:admin/brand/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = $user_id;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/brand/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = $user_id;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/brand/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = $user_id;
        $brand->save();
        return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
