<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:250', 'unique:projects'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'img' => ['required', 'array'],
            'img.*.description' => ['required', 'string'],
            'img.*.image' => ['required', 'image', 'mimes:jpg,jpeg,webp']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'img.*.image' => 'image',
            'img.*.description' => 'description',
        ];
    }
}
