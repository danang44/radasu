<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\penjual;
class pembeli extends Model
{
    protected $table = "pembelis";

    protected $fillable = ['id','user_id', 'alamat', 'nomer_hp'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
