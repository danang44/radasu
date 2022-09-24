<?php

namespace App\Http\Controllers\User;

use App\detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\produkpenjual;
use App\keranjang;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'produkpenjual_id' => 'required',
        ]);
        $itemuser = $request->user();
        $produkpenjual = produkpenjual::findOrFail($request->produkpenjual_id);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login

        // if ($request->qty > $product->stok) {
        //     return back()->with('error', 'Pesanan melebihi stok');
        // }

        $keranjang = keranjang::where('user_id', $itemuser->id)
            ->where('status', 'cart')
            ->first();

        if ($keranjang) {
            $itemcart = $keranjang;
        } else {

            //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            $inputancart['user_id'] = $itemuser->id;
            $inputancart['status'] = 'cart';
            $itemcart = keranjang::create($inputancart);
        }
        // cek dulu apakah sudah ada product di shopping cart
        $cekdetail = detail::where('keranjang_id', $itemcart->id)
            ->where('productpenjual_id', $produkpenjual->id);
        // diskon diambil kalo product itu ada promo, cek materi sebelumnya
        if ($cekdetail) {
            // update detail di table cart_detail
            // $cekdetail->updatedetail($cekdetail, $qty, $harga);
            // update subtotal dan total di table cart
            //$cekdetail->cart->updatetotal($cekdetail->cart, $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['keranjang_id'] = $itemcart->id;
            $inputan['produkpenjual_id'] = $produkpenjual->id;
            $inputan['qty'] = 1;
            $inputan['harga'] = $produkpenjual->harga;
            $inputan['subtotal'] = $produkpenjual->harga;
            $itemdetail = detail::create($inputan);
            // update subtotal dan total di table 
            $itemdetail->status = 'cart';
            $itemdetail->update();
        }
        return back();
    }
}
