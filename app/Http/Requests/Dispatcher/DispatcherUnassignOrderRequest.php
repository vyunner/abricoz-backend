<?php

namespace App\Http\Requests\Dispatcher;

use Illuminate\Foundation\Http\FormRequest;

class DispatcherUnassignOrderRequest extends FormRequest
{
    public function authorize()
    {
        // Добавьте проверку прав, если необходимо
        return true;
    }

    public function rules()
    {
        return [
            'order_user_ids' => 'required|array|min:1', // Ожидаем массив объектов
            'order_user_ids.*.user_id' => 'required|exists:users,id', // Проверяем, что каждый user_id существует
            'order_user_ids.*.order_id' => 'required|exists:orders,id', // Проверяем, что каждый order_id существует
        ];
    }
}
