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
            'order_user_ids' => 'required|array|min:1',
            'order_user_ids.*.order_id' => 'required|exists:orders,id',
            'order_user_ids.*.user_id' => 'required|exists:users,id',
        ];
    }
}
