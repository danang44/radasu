<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\penjual;
use App\user;

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

}
