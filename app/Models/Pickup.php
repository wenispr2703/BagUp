<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;

class Pickup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_pickup',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'pickup_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'pickup_id', 'id');
    }
}
