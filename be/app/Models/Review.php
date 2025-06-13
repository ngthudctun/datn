<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_item_id',
        'product_id',
        'rating',
        'content',
    ];

    /**
     * Quan hệ: Mỗi review thuộc về một người dùng.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quan hệ: Mỗi review thuộc về một sản phẩm.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Quan hệ: Mỗi review gắn với một mục đơn hàng cụ thể.
     */
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
