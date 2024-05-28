<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryIndexRequest extends FormRequest
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
            'perPage' => 'nullable|int',
            'page' => 'nullable|int',
            'category_id' => 'nullable|int|exists:categories,id',
            'subcategory_id' => 'nullable|array',
            'subcategory_id.*' => 'nullable|integer|exists:subcategories,id',
            'name' => 'nullable|string',
        ];
    }
}
