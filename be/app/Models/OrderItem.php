<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_variant_id',
        'quantity',
        'price',
        'discount',
        'final_price',
    ];

    // Mối quan hệ với đơn hàng
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mối quan hệ với biến thể sản phẩm
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    // Nếu bạn có đánh giá (review) gắn với order_item
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
