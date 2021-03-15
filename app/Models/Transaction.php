<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public static function transaction_code()
    {
        $cek = Transaction::all();
        if ($cek->count() > 0) {
            $transaksi = Transaction::orderBy('id', 'DESC')->first();
            $nourut = (int) substr($transaksi->kode, -8, 8);
            $nourut++;
            $char = "INV";
            $number = $char  .  sprintf("%08s", $nourut);
        } else {
            $number = "INV"  . "00000001";
        }
        return $number;
    }
}
