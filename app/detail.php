<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $table = "details";
    protected $fillable = ['id', 'keranjang_id', 'produkpenjual_id', 'qty', 'harga', 'subtotal'];

    public function cart()
    {
        return $this->belongsTo('App\keranjang', 'keranjang_id');
    }

    public function product()
    {
        return $this->belongsTo('App\produkpenjual', 'produkpenjual_id');
    }
    public function updatedetail($cekdetail, $qty, $harga)
    {
        $this->attributes['qty'] = $cekdetail->qty + $qty;
        $this->attributes['subtotal'] = $cekdetail->subtotal + (($qty * $harga));
        self::save();
    }
}
