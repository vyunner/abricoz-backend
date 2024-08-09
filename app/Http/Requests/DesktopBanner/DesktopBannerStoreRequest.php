<?php

namespace App\Http\Requests\DesktopBanner;

use Illuminate\Foundation\Http\FormRequest;

class DesktopBannerStoreRequest extends FormRequest
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
            'ru_image' => 'required|image|max:10000',
            'kz_image' => 'required|image|max:10000',
            'en_image' => 'required|image|max:10000',
        ];
    }
}
