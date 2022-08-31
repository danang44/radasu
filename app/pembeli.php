<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\penjual;
class pembeli extends Model
{
    protected $table = "pembeli";

    protected $fillable = ['nama', 'email', 'password', 'role'];

    public function penjual()
    {
        return $this->hasMany('App\penjual', 'id', 'id_pembeli');
    }
}
