<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'detail' => 'required|min:2',
            'metakey' => 'required',
            'metadesc' => 'required',
            'images' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề.',
            'title.min' => 'Tên có ít nhất 2 ký tự.',
            'detail.required' => 'Bạn chưa nhập nội dung.',
            'detail.min' => 'Nội dung có ít nhất 2 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả.',
            'images.required' => 'Bạn chưa chọn hình ảnh, vui lòng chọn và thử lại.',
        ];
    }
}
