<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
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
            'country_id' => 'nullable|array',
            'country_id.*' => 'nullable|integer|exists:countries,id',
            'brand_id' => 'nullable|array',
            'brand_id.*' => 'nullable|integer|exists:brands,id',
            'subcategory_id' => 'nullable|array',
            'subcategory_id.*' => 'nullable|integer|exists:subcategories,id',
            'name' => 'nullable|string',
        ];
    }
}
