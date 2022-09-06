<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pembeli;
use App\user;

class PembeliController extends Controller
{
    public function index()
    {
        $user = user::where('role','3')->get();
        $pembeli = pembeli::get();
        return view('admin.pembeli.pembeli',['pembeli' => $pembeli, 'user' => $user]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            // 'id_kategori' => 'required',
            'user_id' => 'required',
            'alamat' => 'required',
            'nomer_hp' => 'required',
            
            //'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        pembeli::create([
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'nomer_hp' => $request->nomer_hp,
            
        ]);


        return redirect('/pembeli');
    }
}
