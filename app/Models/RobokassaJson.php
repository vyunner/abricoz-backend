<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RobokassaJson extends Model
{
    use HasFactory;

    protected $table = 'robokassa_json';

    protected $guarded = [];

    protected $casts = ['data' => 'array'];
}
