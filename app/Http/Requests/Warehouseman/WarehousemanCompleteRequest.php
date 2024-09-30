<?php

namespace App\Http\Requests\Warehouseman;

use Illuminate\Foundation\Http\FormRequest;

class WarehousemanCompleteRequest extends FormRequest
{
    /**
     * Определяем, авторизован ли пользователь для выполнения этого запроса
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации для запроса
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|int|exists:orders,id',
        ];
    }
}
