<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','category_id','suplier_id','nama','harga_sewa','stok','deskripsi','gambar','is_ready'];
}
