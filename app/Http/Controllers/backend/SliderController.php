<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Link;

use App\Models\Slider;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    #GET:admin/slider, admin/slider/index
    public function index()
    {
        

        $list_slider = Slider::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.index', compact('list_slider'));
    }
    #GET:admin/slider/trash
    public function trash()
    {
        

        $list_slider = Slider::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.trash', compact('list_slider'));
    }

    #GET: admin/slider/create
    public function create()
    {
        

        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_sort_order = '';
        foreach ($list_slider as $item) {
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.slider.create', compact('html_sort_order'));
    }


    public function store(SliderStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $slider = new Slider; //tạo mới mẫu tin
        $slider->name = $request->name;
        $slider->link = $request->link;
        $slider->sort_order = $request->sort_order;
        $slider->position = $request->position;
        $slider->status = $request->status;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $slug = Str::slug($slider->name = $request->name, '-');
            $path_dir = "public/images/slider/";
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $slider->image = $filename;
        }
        //end upload
        if ($slider->save()) {
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thêm slider thành công!']);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm slider không thành công!']);
    }

    public function show(string $id)
    {
        

        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.slider.show', compact('slider'));
    }

    public function edit(string $id)
    {
        

        $slider = Slider::find($id);
        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_sort_order = '';

        foreach ($list_slider as $item) {
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.slider.edit', compact('slider', 'html_sort_order'));
    }

    public function update(SliderUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $slider = Slider::find($id); //lấy mẫu tin
        $slider->name = $request->name;
        $slider->link = $request->link;
        $slider->sort_order = $request->sort_order;
        $slider->position = $request->position;
        $slider->status = $request->status;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = $user_id;

        //upload image
        if ($request->has('image')) {
            $slug = Str::slug($slider->name = $request->name, '-');
            $path_dir = "public/images/slider/";
            if (File::exists(($path_dir . $slider->image))) {
                File::delete(($path_dir . $slider->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $slider->image = $filename;
        }
        //end upload
        if ($slider->save()) {
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật slider thành công!']);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật slider không thành công!']);
    }

    #GET:admin/slider/destroy/{id}
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/slider/";
        $path_image_delete = $path_dir . $slider->image;
        if ($slider == null) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($slider->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa slider thành công!']);
        }
        return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa slider không thành công!']);
    }
    #GET:admin/slider/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $slider->status = ($slider->status == 1) ? 2 : 1;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = $user_id;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/slider/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $slider->status = 0;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = $user_id;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/slider/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $slider->status = 2;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = $user_id;
        $slider->save();
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
