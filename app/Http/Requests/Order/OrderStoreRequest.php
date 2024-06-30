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
            'city_id' => 'required|int|exists:cities,id',
            'district_id' => 'required|int|exists:districts,id',
            'address' => 'required|string',
            'address_comment' => 'nullable|string',
            'order_comment' => 'nullable|string',
            'delivery_date' => 'required|date',
        ];
    }
}
