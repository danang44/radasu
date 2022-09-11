<?php

namespace App\Http\Controllers\Suplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SK;
use App\user;

class SKController extends Controller
{
    public function index()
    {
        $user = user::where('role','2')->get();
        $SK = SK::get();
        return view('Suplier.Sk.Sk',['SK' => $SK, 'user' => $user]);
    }

    public function store(Request $request)
    {
    //dd($request);
    $this->validate($request, [
        'user_id' => 'required',
        'SK1' => 'required',
        'SK2' => 'required',
        'SK3' => 'required',
        'SK4' => 'required',
        'SK5' => 'required',
        'SK6' => 'required',
        'SK7' => 'required',
        'SK8' => 'required',
        'SK9' => 'required',
        'SK10' => 'required',

    ]);

    SK::create([
    'user_id' => $request->user_id,
    'SK1' => $request->SK1,
    'SK2' => $request->SK2,
    'SK3' => $request->SK3,
    'SK4' => $request->SK4,
    'SK5' => $request->SK5,
    'SK6' => $request->SK6,
    'SK7' => $request->SK7,
    'SK8' => $request->SK8,
    'SK9' => $request->SK9,
    'SK10' => $request->SK10,
    ]);


    return redirect('/Sk');
    }

    // public function edit($id)
    // {
    //     $SK = SK::find($id);
    //     return response()->json([
    //         'status' => 200,
    //         'SK' => $SK,
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request)
    // {

    //     DB::table('s_k_s')->where('id', $request->id)->update([

    //         'alamat' => $request->alamat,
    //         'nama_toko' => $request->nama_toko,
    //         'ktp' => $request->ktp,
    //         'pengiriman' => $request->pengiriman,
    //     ]);
    //     return redirect('/SK');
    // }
    // public function destroy(Request $request)
    // {
    //     $id = $request->input('delete_id');
    //     $SK = SK::find($id);
    //     $SK->delete();
    //     return redirect()->back()->with('status', 'Data berhasil dihapus');
    // }
}
