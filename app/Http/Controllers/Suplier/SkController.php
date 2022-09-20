<?php

namespace App\Http\Controllers\Suplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SK;
use App\user;

class SKController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $SK = SK::where('user_id', Auth::user()->id)->get();
        }
        return view('Suplier.Sk.Sk',['SK' => $SK]);
    }

    public function store(Request $request)
    {
    //dd($request);
    $this->validate($request, [
        'user_id' => 'required',
        'sk1' => 'required',
        'sk2' => 'required',
        'sk3' => 'required',
        'sk4' => 'required',
        'sk5' => 'required',
        'sk6' => 'required',
        'sk7' => 'required',
        'sk8' => 'required',
        'sk9' => 'required',
        'sk10' => 'required',

    ]);

    sk::create([
    'user_id' => $request->user_id,
    'sk1' => $request->sk1,
    'sk2' => $request->sk2,
    'sk3' => $request->sk3,
    'sk4' => $request->sk4,
    'sk5' => $request->sk5,
    'sk6' => $request->sk6,
    'sk7' => $request->sk7,
    'sk8' => $request->sk8,
    'sk9' => $request->sk9,
    'sk10' => $request->sk10,
    ]);


    return redirect('/sk');
    }

    public function edit($id)
    {
        $sk = sk::find($id);
        return response()->json([
            'status' => 200,
            'sk' => $sk,
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
        DB::table('s_k_s')->where('id', $request->id)->update([

            'id' => $request->id,
            'user_id' => $request->user_id,
            'sk1' => $request->sk1,
            'sk2' => $request->sk2,
            'sk3' => $request->sk3,
            'sk4' => $request->sk4,
            'sk5' => $request->sk5,
            'sk6' => $request->sk6,
            'sk7' => $request->sk7,
            'sk8' => $request->sk8,
            'sk9' => $request->sk9,
            'sk10' => $request->sk10,
        ]);
        return redirect('/sk');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $SK = SK::find($id);
        $SK->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
