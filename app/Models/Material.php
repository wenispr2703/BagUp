<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_material',
        'harga',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'material_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'material_id', 'id');
    }
}
