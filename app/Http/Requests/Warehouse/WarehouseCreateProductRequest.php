<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseCreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subcategory_id' => 'required|exists:subcategories,id',
            'manufacturer' => 'nullable|string',
            'where' => 'nullable|string',
            'name_ru' => 'required|string',
            'name_kz' => 'required|string',
            'description_ru' => 'required|string',
            'description_kz' => 'required|string',
            'weight' => 'required|string',
            'calories' => 'nullable',
            'proteins' => 'nullable',
            'fats' => 'nullable',
            'carbohydrates' => 'nullable',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'price_with_discount' => 'required|integer',
            'total_sales' => 'nullable|integer',
            'amount' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ];
    }
}
