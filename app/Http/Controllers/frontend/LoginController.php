<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getlogin()
    {
        return view('frontend.auth.login');
    }

    public function postlogin(LoginRequest $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'password.required'=>'Bạn chưa nhập mật khẩu!',
            'password.min'=>'Mật khẩu không được nhỏ hon !',
            'password.max'=>'Bạn chưa nhập mật khẩu!',

        ]);
        $username = $request->username;
        $password = $request->password;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data = ['email' => $username, 'password' => $password];
        } else {
            $data = ['name' => $username, 'password' => $password];
        }
        // var_dump($data);
        if (Auth::attempt($data)) {
            return redirect('admin');
            // echo "thanh cong";
        } else {
            // return redirect()->route('admin/login')->with('message', ['type' => 'dangers', 'msg' => 'Email hoặc password không đúng. Vui lòng nhập lại!']);
            return redirect('admin/login');
            // echo bcrypt('123456'); //mã hóa 
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('backend.auth.login');
    }
}
