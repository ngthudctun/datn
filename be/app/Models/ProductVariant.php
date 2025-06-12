<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock_quantity',
        'status',
    ];

    // 🔗 Mối quan hệ: ProductVariant thuộc về Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 🔗 Mối quan hệ: ProductVariant có nhiều OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
