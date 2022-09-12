<?php

namespace App;
use App\category;
use App\user;
use Illuminate\Database\Eloquent\Model;

class produkpenjual extends Model
{
    protected $table = "produkpenjuals";

    protected $fillable = ['id','user_id','category_id','nama','stok','tersedia','harga','deskripsi','gambar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
