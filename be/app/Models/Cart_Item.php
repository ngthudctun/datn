<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'cart_item_id';
    protected $fillable = ['cart_id', 'product_variant_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
