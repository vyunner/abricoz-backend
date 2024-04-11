<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'photo_url' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_kz' => 'nullable|string',
            'name_en' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_kz' => 'nullable|string',
            'description_en' => 'nullable|string',
        ];
    }
}
