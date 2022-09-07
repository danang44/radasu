<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
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
    public function edit($id)
    {
        $pembeli = pembeli::find($id);
        return response()->json([
            'status' => 200,
            'pembeli' => $pembeli,
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

        DB::table('pembelis')->where('id', $request->id)->update([

            'alamat' => $request->alamat,
            'nomer_hp' => $request->nomer_hp,
        ]);
        return redirect('/pembeli');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $pembeli = pembeli::find($id);
        $pembeli->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }

}

