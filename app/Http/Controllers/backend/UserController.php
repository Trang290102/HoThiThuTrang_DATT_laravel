<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    #GET:admin/user, admin/user/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_user = User::where([['status', '!=', 0]])->get();
        return view('backend.user.index', compact('list_user', 'user_name'));
    }
    #GET:admin/user/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_user = User::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.user.trash', compact('list_user', 'user_name'));
    }

    #GET: admin/user/create
    public function create()
    {
        $user_name = Auth::user()->name;
        return view('backend.user.create', compact('user_name'));
    }

    public function store(UserStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user = new User; // tạo mới
        $user->name = $request->name; //tên có thể đăng nhâp
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;
        // $user->password = bcrypt('$request->password');
        $user->roles = $request->roles;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = $user_id;
        // upload file
        $slug = Str::slug($user->name = $request->name, '-');
        if ($request->has('image')) {
            $path_dir = "public/images/user/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $user->image = $filename;
            $user->save();
            return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Thành công']);
        } else {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại']);
        }
    }

    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.user.show', compact('user', 'user_name'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user = User::find($id); //lấy mẫu tin
        $user->name = $request->name; //tên có thể đăng nhâp
        $user->username = $request->username;
        $user->phone = $request->phone;
        // $user->password = bcrypt('$request->password');
        //mật khẩu nên có 1 trang riêng để thay đổi mật khẩu, cần xác nhận mật khẩu cũ trước khi encode
        $user->roles = $request->roles;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = $user_id;
        //upload image
        $slug = Str::slug($user->name = $request->name, '-');
        if ($request->has('image')) {
            $path_dir = "public/images/user/";
            if (File::exists(($path_dir . $user->image))) {
                File::delete(($path_dir . $user->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $user->image = $filename;
        }
        //end upload
        if ($user->save()) {
            return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thương hiệu thành công!']);
        }
        return redirect()->route('user.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật thương hiệu không thành công!']);
    }

    #GET:admin/user/destroy/{id}
    public function destroy(string $id)
    {
        $user = User::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/user/";
        $path_image_delete = $path_dir . $user->image;
        if ($user == null) {
            return redirect()->route('user.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($user->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('user.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thương hiệu thành công!']);
        }
        return redirect()->route('user.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa thương hiệu không thành công!']);
    }
    #GET:admin/user/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = $user_id;
        $user->save();
        return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/user/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = $user_id;
        $user->save();
        return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/user/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = $user_id;
        $user->save();
        return redirect()->route('user.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
