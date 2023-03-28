<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ];
    }
}
