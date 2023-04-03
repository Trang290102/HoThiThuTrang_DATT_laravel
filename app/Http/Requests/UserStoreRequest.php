<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:httt_user',
            // 'other'=>'name',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
            'roles' => 'required'
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
            'phone.required' => 'Chưa nhập số điện thoại',
            'address.required' => 'Chưa nhập địa chỉ',
            'password.required' => 'Chưa nhập mật khẩu',
            'roles.required' => 'Chưa chọn phận sự'

        ];
    }
}
