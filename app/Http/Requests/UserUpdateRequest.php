<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'roles' => 'required',
            'address' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'username.required' => 'Bạn chưa nhập tên tài khoản',
            'email.required' => 'Bạn chưa nhập email',
            'address.required' => 'Chưa nhập địa chỉ',
            'phone.required' => 'Chưa nhập số điện thoại',
            'roles.required' => 'Chưa chọn phận sự'
        ];
    }
}
