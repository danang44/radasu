<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::paginate(10);

        // dd($clothes);
        return view('admin.kategori.kategori', ['category' => $category]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            // 'id' => 'required',
            'keterangan' => 'required',

        ]);
        Category::create([
            // 'id' => $request->id,
            'keterangan' => $request->keterangan,
        ]);


        // dd($clothes);
        // dd($clothes);
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category' => $category,
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

        DB::table('categories')->where('id', $request->id)->update([

            'id' => $request->id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/kategori');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}