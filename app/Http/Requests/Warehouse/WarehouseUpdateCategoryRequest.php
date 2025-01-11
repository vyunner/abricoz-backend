<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseUpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ru' => 'sometimes|required|string|unique:categories,name_ru,' . $this->route('id'),
            'name_kz' => 'sometimes|required|string|unique:categories,name_kz,' . $this->route('id'),
            'name_en' => 'sometimes|required|string|unique:categories,name_en,' . $this->route('id'),
            // Добавьте другие поля, если необходимо
        ];
    }
}
