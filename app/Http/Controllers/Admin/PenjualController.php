<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\penjual;
use App\user;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    public function index()
    {
        $user = user::where('role','2')->get();
        $penjual = penjual::get();
        return view('admin.penjual.penjual',['penjual' => $penjual, 'user' => $user]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            // 'id_kategori' => 'required',
            'user_id' => 'required',
            'alamat' => 'required',
            'nama_toko' => 'required',
            'ktp' => 'required',
            'pengiriman' => 'required',
            //'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        penjual::create([
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'nama_toko' => $request->nama_toko,
            'ktp' => $request->ktp,
            'pengiriman' => $request->pengiriman,
        ]);
        


        return redirect('/penjual');
    }
    public function edit($id)
    {
        $penjual = penjual::find($id);
        return response()->json([
            'status' => 200,
            'penjual' => $penjual,
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
        DB::table('penjuals')->where('id', $request->id)->update([
            'id' => $request->id,
            'user_id' => $request->user_id,
            //'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nama_toko' => $request->nama_toko,
            'ktp' => $request->ktp,
            'pengiriman' => $request->pengiriman,
        ]);
        return redirect('/penjual');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $category = Penjual::find($id);
        $category->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }

}
