<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'subcategory_id' => 'nullable|int|exists:subcategories,id',
            'country_id' => 'nullable|int|exists:countries,id',
            'brand_id' => 'nullable|int|exists:brands,id',
            'name_ru' => 'nullable|string',
            'name_kz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_kz' => 'nullable|string',
            'price' => 'nullable|int',
            'discount' => 'nullable|int',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:10000'
        ];
    }
}
