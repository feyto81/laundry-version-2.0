<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Outlet;
use App\Models\Paket;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function Paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
