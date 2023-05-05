<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    #GET:admin/user, admin/user/index
    public function index()
    {
        
        $list_customer = User::where([['status', '!=', 0], ['roles', '=', 2]])->get();
        return view('backend.customer.index', compact('list_customer'));
    }
    #GET:admin/user/trash
    public function trash()
    {
        
        $list_customer = User::where([['status', '=', 0], ['roles', '=', 2]])->orderBy('created_at', 'desc')->get();
        return view('backend.customer.trash', compact('list_customer'));
    }

    #GET: admin/user/create
    public function create()
    {
        
        return view('backend.customer.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $customer = new User; // tạo mới
        $customer->name = $request->name; //tên có thể đăng nhâp
        $customer->username = $request->username;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        $customer->roles = '2';
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->status = $request->status;
        $customer->created_at = date('Y-m-d H:i:s');
        $customer->created_by = $user_id;
        // upload file
        $slug = Str::slug($customer->name = $request->name, '-');
        if ($request->has('image')) {
            $path_dir = "public/images/customer/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $customer->image = $filename;
            $customer->save();
            return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Thành công']);
        } else {
            return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại']);
        }
    }

    public function show(string $id)
    {
        
        $customer = User::find($id);
        if ($customer == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.customer.show', compact('customer'));
    }

    public function edit(string $id)
    {
        
        $customer = User::find($id);
        return view('backend.customer.edit', compact('customer'));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $customer = User::find($id); //lấy mẫu tin
        $customer->name = $request->name; //tên có thể đăng nhâp
        $customer->username = $request->username;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        //mật khẩu nên có 1 trang riêng để thay đổi mật khẩu, cần xác nhận mật khẩu cũ trước khi encode
        $customer->roles = 2;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->status = $request->status;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = $user_id;
        //upload image
        $slug = Str::slug($customer->name = $request->name, '-');
        if ($request->has('image')) {
            $path_dir = "public/images/customer/";
            if (File::exists(($path_dir . $customer->image))) {
                File::delete(($path_dir . $customer->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $customer->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $customer->image = $filename;
        }
        //end upload
        if ($customer->save()) {
            return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật khách hàng thành công!']);
        }
        return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật khách hàng không thành công!']);
    }

    #GET:admin/user/destroy/{id}
    public function destroy(string $id)
    {
        $customer = User::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/customer/";
        $path_image_delete = $path_dir . $customer->image;
        if ($customer == null) {
            return redirect()->route('customer.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($customer->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('customer.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa khách hàng thành công!']);
        }
        return redirect()->route('customer.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa khách hàng không thành công!']);
    }
    #GET:admin/user/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $customer = User::find($id);
        if ($customer == null) {
            return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $customer->status = ($customer->status == 1) ? 2 : 1;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = $user_id;
        $customer->save();
        return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/user/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $customer = User::find($id);
        if ($customer == null) {
            return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $customer->status = 0;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = $user_id;
        $customer->save();
        return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/user/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $customer = User::find($id);
        if ($customer == null) {
            return redirect()->route('customer.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $customer->status = 2;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = $user_id;
        $customer->save();
        return redirect()->route('customer.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
