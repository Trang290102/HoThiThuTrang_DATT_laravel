<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'link' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'link.required' => 'Bạn chưa nhập link menu.',
            'metadesc.required' => 'Chưa nhập mô tả.',
        ];
    }
}
