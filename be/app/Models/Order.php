<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'shipping_id',
        'voucher_id',
        'status',
        'payment_status',
        'order_date',
        'note',
        'total_amount',
    ];

  

}
