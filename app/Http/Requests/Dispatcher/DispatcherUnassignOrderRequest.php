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
            'user_id' => 'required|exists:users,id',
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'required|exists:orders,id',
        ];
    }
}
