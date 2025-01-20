<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseCreateSubcategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|max:2048',
            'name_ru' => 'required|string',
            'name_kz' => 'required|string',
        ];
    }
}
