<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public const IN_PROCESS = 1;
    public const ASSEMBLING = 2;
    public const WAITING_FOR_COURIER = 3;
    public const ON_THE_WAY = 4;
    public const DELIVERED = 5;
    public const CANCELLED = 6;
    public const WAITING_FOR_PAYMENT = 7;
}
