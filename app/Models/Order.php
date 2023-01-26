<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Pickup;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Material;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'material_id',
        'color_id',
        'size_id',
        'quantity',
        'customer_id',
        'design',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }
}
