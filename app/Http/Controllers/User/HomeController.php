<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\produkpenjual;

class HomeController extends Controller
{
    public function index()
    {
        $produkpenjual = produkpenjual::get();

        return view('User.home', ['produkpenjual' => $produkpenjual]);
    }
}
