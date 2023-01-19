<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_product',
        'harga',
        'deskripsi',
        'size_id',
        'material_id',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
