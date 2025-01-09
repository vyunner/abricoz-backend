<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
            'phone' => 'required|exists:users,phone',
            'code' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $phone = $this->input('phone');
            $code = $this->input('code');

            // Проверяем, соответствует ли код телефону
            $user = \App\Models\User::where('phone', $phone)
                ->where('phone_verification_code', $code)
                ->first();

            if (!$user) {
                $validator->errors()->add('code', 'Код подтверждения неверен.');
            }
        });
    }
}
