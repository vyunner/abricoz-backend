<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseUpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'manufacturer' => 'nullable|string',
            'where' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_kz' => 'nullable|string',
            'name_en' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_kz' => 'nullable|string',
            'description_en' => 'nullable|string',
            'weight' => 'nullable|string',
            'calories' => 'nullable|numeric',
            'proteins' => 'nullable|numeric',
            'fats' => 'nullable|numeric',
            'carbohydrates' => 'nullable|numeric',
            'price' => 'nullable|integer',
            'discount' => 'nullable|integer',
            'price_with_discount' => 'nullable|integer',
            'total_sales' => 'nullable|integer',
            'amount' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ];
    }
}
