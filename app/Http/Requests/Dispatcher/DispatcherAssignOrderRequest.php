<?php

namespace App\Http\Requests\Dispatcher;

use Illuminate\Foundation\Http\FormRequest;

class DispatcherAssignOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id', // проверяем наличие и существование user_id
            'order_ids' => 'required|array|min:1', // проверяем, что передан массив order_ids
            'order_ids.*' => 'required|exists:orders,id', // проверяем, что каждый элемент массива существует
        ];
    }
}
