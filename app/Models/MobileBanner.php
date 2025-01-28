<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileBanner extends Model
{
    use HasFactory;

    protected $table = 'mobile_banners';

    protected $fillable = [
        'image_url',
        'title_kz',
        'title_en',
        'title_ru',
        'number',
    ];

    public function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->image_url, PHP_URL_PATH)
        );
    }
}
