<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', Rule::unique('projects')->ignore($this->project)],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'img' => ['required', 'array'],
            'img.*.description' => ['required', 'string'],
            'img.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,webp']
        ];
    }
}
