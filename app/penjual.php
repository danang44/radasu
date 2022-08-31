<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pembeli;
class penjual extends Model
{
    protected $table = "penjual";

    protected $fillable = ['id_pembeli','nama', 'alamat', 'pengirim'];

    public function pembeli()
    {
        return $this->belongsTo('App\pembeli', 'id_pembeli', 'id');
    }
}
