<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    protected $table = "s_k_s";
    protected $fillable = ['id','user_id','sk1','sk2','sk3','sk4','sk5','sk6','sk7','sk8','sk9','sk10'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
