<?php

namespace App;
use App\category;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','category_id','suplier_id','nama','harga_sewa','stok','deskripsi','gambar','is_ready'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
 
}
