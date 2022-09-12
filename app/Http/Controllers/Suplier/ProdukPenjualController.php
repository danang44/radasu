<?php

namespace App\Http\Controllers\Suplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\produkpenjual;
use App\category;
use App\user;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProdukPenjualController extends Controller
{
    public function index()
    {
        $user = user::where('role','2')->get();
        $category = category::all();
        $produkpenjual = produkpenjual::get();
        return view('suplier.produkpenjual.produkpenjual',['produkpenjual' => $produkpenjual, 'user' => $user, 'category' => $category]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'category_id' => 'required',
            'user_id' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'tersedia' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        // menyimpan data file yang diupload ke variabel $file
        $produkpenjual = $request->file('gambar');

        $nama_file = time() . "_" . $produkpenjual->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_suplierproduk';
        $produkpenjual->move($tujuan_upload, $nama_file);
        

        //$user = Auth::id();
        //dd($user);
        produkpenjual::create([
            'category_id'  => $request-> category_id,
            'user_id'  => $request -> user_id,
            'nama'  => $request->nama,
            'stok' => $request ->stok,
            'tersedia' => $request ->tersedia,
            'harga' => $request ->harga,
            'deskripsi' => $request ->deskripsi,
            'gambar' => $nama_file,
        ]);


        return redirect('/PP');
    }

    public function edit($id)
    {
        $produkpenjual = produkpenjual::find($id);
        return response()->json([
            'status' => 200,
            'produkpenjual' => $produkpenjual,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        //dd($request);
        DB::table('produkpenjuals')->where('id', $request->id)->update([

            'id' => $request->id,
            'tersedia' => $request->tersedia,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        return redirect('/PP');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $produkpenjual = produkpenjual::find($id);
        $produkpenjual->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
