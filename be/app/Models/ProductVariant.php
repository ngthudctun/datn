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

    // Mối quan hệ: Biến thể (variant) thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Mối quan hệ: Biến thể này có thể nằm trong nhiều đơn hàng (order_items)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function getFinalPriceAttribute()
    {
        // Lấy discount hiện tại từ sản phẩm cha
        $discount = $this->product->discount;

        // Nếu không có giảm giá thì trả về giá gốc
        if (!$discount) {
            return $this->price;
        }

        // Giảm giá theo phàn trăm
        if ($discount->discount_type === 'percentage') {
            return round($this->price * (1 - $discount->value / 100), 2);
        }

        // Giảm giá theo tiền cố định mỗi sp
        if ($discount->discount_type === 'fixed_amount') {
            return max(0, $this->price - $discount->value); 
        }

        // Trường hợp lỗi để lại giá gốc
        return $this->price;
    }
}
