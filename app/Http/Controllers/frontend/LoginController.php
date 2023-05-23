<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function getdangnhap()
    {
        return view('frontend.auth.login');
    }

    public function postdangnhap(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên hoặc email đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);
        $username = $request->username;
        $password = $request->password;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data = ['email' => $username, 'password' => $password];
        } else {
            $data = ['name' => $username, 'password' => $password];
        }
        // var_dump($data);
        if (Auth::guard('customer')->attempt(($data), $request->has('remember'))) {
            // return redirect('frontend.home');
            return redirect()->route('frontend.home')->with('successMessage', 'Đăng nhập thành công!');
        } else {
            // return redirect()->route('admin/login')->with('message', ['type' => 'dangers', 'msg' => 'Email hoặc password không đúng. Vui lòng nhập lại!']);
            return redirect()->back()->with('errorMessage', 'Đăng nhập thất bại! Vui lòng kiểm tra tên và mật khẩu hoặc liên hệ CSKH. Xin cảm ơn!');
            // echo bcrypt('123456'); //mã hóa 
        }
    }
    public function dangxuat()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('frontend.home');
    }
    //->with('successMessage', 'Đăng xuất thành công!')
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function postregister(RegisterRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user = new User; // tạo mới
        $user->name = $request->name; //tên có thể đăng nhâp
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->roles = 2;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->status = 1;
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->route('getdangnhap')->with('successMessage', 'Đăng ký tài khoản thành công!');
    }

    public function profile()
    {
        return view('frontend.auth.profile');
    }

}




// public function postregister(RegisterRequest $request)
// {
//     date_default_timezone_set("Asia/Ho_Chi_Minh");
//     $user = new User; // tạo mới
//     $user->name = $request->name; //tên có thể đăng nhâp
//     $user->username = $request->username;
//     $user->phone = $request->phone;
//     $user->address = $request->address;
//     $user->password = bcrypt($request->password);
//     $user->roles = 2;
//     $user->email = $request->email;
//     $user->gender = $request->gender;
//     $user->status = 1;
//     $user->created_at = date('Y-m-d H:i:s');
//     // upload file
//     $slug = Str::slug($user->name = $request->name, '-');
//     if ($request->has('image')) {
//         $path_dir = "public/images/user/";
//         $file = $request->file('image');
//         $extension = $file->getClientOriginalExtension();
//         $filename = $slug . '.' . $extension;
//         $file->move($path_dir, $filename);
//         $user->image = $filename;
//         $user->save();
//         return redirect()->route('getdangnhap')->with('message', ['type' => 'success', 'msg' => 'Đăng ký tài khoản thành công!!!']);
//     } else {
//         return redirect()->route('getdangnhap')->with('message', ['type' => 'danger', 'msg' => 'Đăng ký tài khoản thất bại. Vui lòng thử lại!!!']);
//     }
// }
