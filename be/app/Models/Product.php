<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'image',
        'description',
        'short_description',
        'slug',
        'status',
        'category_id',
        'brand_id',
    ];

    // Danh sách biến thể
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Giảm giá áp dụng
    public function discount()
    {
        return $this->hasOne(Discount::class)
            ->whereDate('start_date', '<=', Carbon::now())
            ->whereDate('end_date', '>=', Carbon::now());
    }

    // Trả về phần trăm giảm
    public function getDiscountRateAttribute()
    {
        $discount = $this->discount;
        if (!$discount || $discount->discount_type !== 'percentage') {
            return 0;
        }
        return $discount->value;
    }

    // Trả về phần trăm giảm giá biến thể
    public function getMinFinalPriceAttribute()
    {
        return $this->variants->min(fn ($variant) => $variant->final_price);
    }
}
