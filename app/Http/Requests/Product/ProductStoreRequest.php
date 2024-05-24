<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'subcategory_id' => 'required|int|exists:subcategories,id',
            'country_id' => 'required|int|exists:countries,id',
            'brand_id' => 'required|int|exists:brands,id',
            'name_ru' => 'required|string',
            'name_kz' => 'required|string',
            'name_en' => 'required|string',
            'description_ru' => 'required|string',
            'description_kz' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|int',
            'discount' => 'required|int',
            'image' => 'nullable|image|max:10000'
        ];
    }
}
