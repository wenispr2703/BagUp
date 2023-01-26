<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Color;
use App\Models\Pickup;
use App\Models\Status;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
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
