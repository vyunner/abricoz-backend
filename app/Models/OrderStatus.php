<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public static const IN_PROCESS = 1;
    public static const ASSEMBLING = 2;
    public static const WAITING_FOR_COURIER = 3;
    public static const ON_THE_WAY = 4;
    public static const DELIVERED = 5;
    public static const CANCELLED = 6;

    protected $guarded = [];
}
