<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
});
