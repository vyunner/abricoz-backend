<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'desktop_image' => ['nullable', 'image', 'max:10000'],
            'mobile_image' => ['nullable', 'image', 'max:10000'],
            'name_ru' => ['required', 'string'],
            'name_kz' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'priority_number' => 'nullable|integer',
        ];
    }
}
