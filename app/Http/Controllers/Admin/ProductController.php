<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $category = category::all();
        $product = product::get();
        return view('admin.produk.produk',['product' => $product, 'category' => $category]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            // 'id_kategori' => 'required',
            'nama' => 'required',
            'harga_sewa' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $product = $request->file('gambar');

        $nama_file = time() . "_" . $product->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_produk';
        $product->move($tujuan_upload, $nama_file);

        Product::create([
            'gambar' => $nama_file,
            'nama' => $request->nama,
            'harga_sewa' => $request->harga_sewa,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
        ]);


        return redirect('/produk');
    }
}
