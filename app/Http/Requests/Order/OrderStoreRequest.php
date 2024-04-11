<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'order_status_id' => 'required|exists:order_statuses,id',
            'delivery_interval_id' => 'required|exists:delivery_intervals,id',
            'address' => 'required|text',
            'address_comment' => 'nullable|text',
            'order_comment' => 'nullable|text',
            'delivery_date' => 'required|date',
        ];
    }
}
