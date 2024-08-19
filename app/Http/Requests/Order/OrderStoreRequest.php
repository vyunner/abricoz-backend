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
            'delivery_interval_id' => 'required|int|exists:delivery_intervals,id',
            'payment_type_id' => 'required|int|exists:payment_types,id',
            'address_id' => 'required|int|exists:addresses,id',
            'delivery_date' => 'nullable|date',

            'products' => 'required|array',
            'products.*.product_id' => 'required|int|exists:products,id',
            'products.*.product_quantity' => 'required|int|min:1',
        ];
    }
}
