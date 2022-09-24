<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = "keranjangs";

    protected $fillable = ['id', 'user_id', 'status', 'total', 'ongkir', 'grand_total', 'start_date', 'end_date', 'denda'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function detail()
    {
        return $this->hasMany('App\detail', 'keranjang_id');
    }
}
