<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'check_number',
        'ticket_print_url'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
