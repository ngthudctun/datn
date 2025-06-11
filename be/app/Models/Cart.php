<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';
    protected $fillable = ['user_id', 'created_at', 'update_at'];

    public function items()
    {
        return $this->hasMany(Cart_Item::class, 'cart_id');
    }
}
