<?php

namespace App\Http\Requests\Point;

use Illuminate\Foundation\Http\FormRequest;

class PointIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city_id' => 'required|int|exists:cities,id',
        ];
    }
}
