<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_name',
    ];

    // 🔗 Nếu sau này có mối quan hệ với bảng trung gian (ví dụ: product_attributes)
    // bạn có thể thêm quan hệ như:
    // public function products() {
    //     return $this->belongsToMany(Product::class, 'product_attributes');
    // }
}
