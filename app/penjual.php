<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class penjual extends Model
{
    protected $table = "penjuals";

    protected $fillable = ['id','user_id','nama', 'alamat', 'nama_toko','ktp','pengiriman'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
