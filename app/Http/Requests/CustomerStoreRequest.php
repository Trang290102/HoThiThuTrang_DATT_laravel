<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:httt_users',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên đã tồn tại!',
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'email.required' => 'Bạn chưa nhập email',
            'phone.required' => 'Chưa nhập số điện thoại',
            'address.required' => 'Chưa nhập địa chỉ',
            'password.required' => 'Chưa nhập mật khẩu',
        ];
    }
}
