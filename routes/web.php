<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {

    Route::get('/home_admin', 'Admin\AdminController@home')->name('home_admin');
    Route::get('/kategori', 'Admin\CategoryController@index')->name('kategori');

    // Category
    Route::get('/kategori', 'Admin\CategoryController@index');
    Route::post('/kategori_store', 'Admin\CategoryController@store');
    Route::get('/kategori_edit/{id}', 'Admin\CategoryController@edit')->name('kategori_edit');
    Route::post('/kategori/update', 'Admin\CategoryController@update');
    Route::delete('/kategori/delete', 'Admin\CategoryController@destroy')->name('kategori_delete');

    // Product
    Route::get('/produk', 'Admin\ProductController@index');
    Route::post('/produk_store', 'Admin\ProductController@store');
    Route::get('/produk_edit/{id}', 'Admin\ProductController@edit')->name('produk_edit');
    Route::post('/produk/update', 'Admin\ProductController@update');
    Route::delete('/produk/delete', 'Admin\ProductController@destroy')->name('produk_delete');

    // Penjual
    Route::get('/penjual', 'Admin\PenjualController@index');
    Route::post('/penjual_store', 'Admin\PenjualController@store');
    Route::get('/penjual_edit/{id}', 'Admin\PenjualController@edit')->name('penjual_edit');
    Route::post('/penjual/update', 'Admin\PenjualController@update');
    Route::delete('/penjual/delete', 'Admin\PenjualController@destroy')->name('penjual/delete');



    // Pembeli
    Route::get('/pembeli', 'Admin\PembeliController@index');
    Route::post('/pembeli_store', 'Admin\PembeliController@store');
    Route::get('/pembeli_edit/{id}', 'Admin\PembeliController@edit')->name('pembeli_edit');
    Route::post('/pembeli/update', 'Admin\PembeliController@update');
    Route::delete('/pembeli/delete', 'Admin\PembeliController@destroy')->name('pembeli/delete');

    Route::get('/tes', 'TesController@index');
});



Route::group(['middleware' => 'App\Http\Middleware\PenjualMiddleware'], function () {

    Route::get('/home_supplier', 'Suplier\HomeController@index')->name('home_supplier');

    // SK
    Route::get('/sk', 'Suplier\SkController@index');
    Route::post('/Sk_store', 'Suplier\SkController@store');
    // Route::get('/Sk_edit/{id}', 'Admin\SkController@edit')->name('Sk_edit');
    // Route::post('/Sk/update', 'Admin\SkController@update');
    // Route::delete('/Sk/delete', 'Admin\SkController@destroy')->name('Sk/delete');
});

Route::group(['middleware' => 'App\Http\Middleware\PenyewaMiddleware'], function () {

    Route::get('/home_user', 'User\HomeController@index')->name('home_user');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
