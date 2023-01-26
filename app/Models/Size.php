<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_size',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'size_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'size_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'size_id', 'id');
    }
}
