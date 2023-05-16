<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:httt_users',
            // 'other'=>'name',
            'username' => 'required',
            'email' => 'required|unique:httt_users',
            'phone' => 'required|unique:httt_users',
            'address' => 'required',
            'password' => 'required|min:3|max:32',
            'password_re' => 'required|same:password',

            // |unique:httt_user

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên đã tồn tại!',
            'username.required' => 'Bạn chưa nhập tên tài khoản',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã được sử dụng!',
            'phone.required' => 'Chưa nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã được sử dụng!',
            'address.required' => 'Chưa nhập địa chỉ',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 ký tự.',
            'password.max' => 'Mật khẩu có nhiều nhất 32 ký tự.',
            'password_re.required' => 'Vui lòng nhập xác thực mật khẩu!',
            'password_re.same' => 'Mật khẩu xác thực chưa đúng. Vui lòng kiểm tra và nhập lại!',
        ];
    }
}
