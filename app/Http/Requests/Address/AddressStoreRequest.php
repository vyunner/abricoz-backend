<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'city_id' => 'required|int|exists:cities,id',
            'address_street_and_house' => 'required|string',
            'address_apartment' => 'required|string',
            'address_entrance' => 'required|string',
            'address_floor' => 'required|string',
            'address_comment' => 'nullable|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }
}
