<?php

namespace App\Http\Requests\MobileBanner;

use Illuminate\Foundation\Http\FormRequest;

class MobileBannerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'image' => 'required|image|max:10000',
            'title_ru' => 'nullable|string|max:10000',
            'title_kz' => 'nullable|string|max:10000',
            'title_en' => 'nullable|string|max:10000',
        ];
    }
}
