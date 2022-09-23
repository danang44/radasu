<?php

namespace App\Http\Controllers\Suplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\penjual;
use App\produkpenjual;

class HomeController extends Controller
{
    public function index()
    {
        $produkpenjual = produkpenjual::get();
        return view('suplier.home' , ['produkpenjual' => $produkpenjual]);
    }

    public function persetujuan()
    {
        $penjual = penjual::get();
        return view('suplier.persetujuan' ,['penjual' => $penjual]);
    }


}
