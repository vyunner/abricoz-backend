<?php

namespace App\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryUpdateRequest extends FormRequest
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
            'category_id' => 'nullable|int|exists:categories,id',
            'image' => 'nullable|image|max:10000',
            'name_ru' => 'nullable|string',
            'name_kz' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'priority_number' => 'nullable|int',
        ];
    }
}
