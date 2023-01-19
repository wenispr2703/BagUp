<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_warna',
        'kode_warna',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'color_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'color_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'color_id', 'id');
    }
}
