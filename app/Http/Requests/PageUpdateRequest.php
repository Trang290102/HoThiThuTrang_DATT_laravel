<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề.',
            'title.min' => 'Tiêu đề có ít nhất 5 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả.',
        ];
    }
}
