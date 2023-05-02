<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function getlogin()
    {
        return view('backend.auth.login');
    }

    public function postlogin(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data = ['email' => $username, 'password' => $password];
        } else {
            $data = ['username' => $username, 'password' => $password];
        }
        // var_dump($data);
        if (Auth::attempt($data)) {
            return redirect('admin');
            // echo "thanh cong";
        } else {
            // return redirect()->route('admin/login')->with('message', ['type' => 'danger', 'msg' => 'Email hoặc password không đúng. Vui lòng nhập lại!']);
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
