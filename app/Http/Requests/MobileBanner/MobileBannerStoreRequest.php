<?php

namespace App\Http\Requests\MobileBanner;

use Illuminate\Foundation\Http\FormRequest;

class MobileBannerStoreRequest extends FormRequest
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
            'image_ru' => 'required|image|max:10000',
            'image_kz' => 'required|image|max:10000',
            'image_en' => 'required|image|max:10000',
        ];
    }
}
