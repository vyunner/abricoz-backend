<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'address_street_and_house' => 'nullable|string',
            'address_apartment' => 'nullable|string',
            'address_entrance' => 'nullable|string',
            'address_floor' => 'nullable|string',
            'address_comment' => 'nullable|string',
            'longitude' => 'nullable|string',
            'latitude' => 'nullable|string',
        ];
    }
}
