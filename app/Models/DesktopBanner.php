<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesktopBanner extends Model
{
    use HasFactory;

    protected $table = 'desktop_banners';

    protected $fillable = [
        'image_url_kz',
        'image_url_en',
        'image_url_ru',
        'number',
    ];

    public function imagePathKz(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->image_url_kz, PHP_URL_PATH)
        );
    }

    public function imagePathEn(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->image_url_en, PHP_URL_PATH)
        );
    }

    public function imagePathRu(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->image_url_ru, PHP_URL_PATH)
        );
    }
}
