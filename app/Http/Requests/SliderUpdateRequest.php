<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
        ];
    }
}
