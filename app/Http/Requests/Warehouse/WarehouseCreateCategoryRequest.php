<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseCreateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ru' => 'required|string|unique:categories,name_ru',
            'name_kz' => 'required|string|unique:categories,name_kz',
            // Добавьте другие поля, если необходимо
        ];
    }
}
