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

Route::get('/home', 'AdminController@home');


// Category
Route::get('/kategori', 'Admin\CategoryController@index');
Route::post('/kategori_store', 'Admin\CategoryController@store');
Route::get('/kategori_edit/{id}', 'Admin\CategoryController@edit')->name('kategori_edit');
Route::post('/kategori/update', 'Admin\CategoryController@update');
Route::delete('/kategori/delete', 'Admin\CategoryController@destroy')->name('kategori_delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {
Route::get('/kategori', 'Admin\CategoryController@index')->name('kategori');


// Product
Route::get('/produk', 'Admin\ProductController@index');
Route::post('/produk_store', 'Admin\ProductController@store');
Route::get('/produk_edit/{id}', 'Admin\ProductController@edit')->name('produk_edit');
Route::post('/produk/update', 'Admin\ProductController@update');
Route::delete('/produk/delete', 'Admin\ProductController@destroy')->name('produk_delete');


});
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


Route::group(['middleware' => ['role:suplier']], function () {
 

    // Product
  
  
    Route::get('/home_supplier', 'Suplier\HomeController@index')->name('home_supplier');
    
    });

Route::group(['middleware' => ['role:user']], function () {
    
    // Product
  
  
    Route::get('/home_user', 'User\HomeController@index')->name('home_user');
    
    });
