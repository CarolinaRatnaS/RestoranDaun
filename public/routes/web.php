<?php

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
Route::get('/home/{id}/tambah', 'HomeController@create');

Route::resource('produk', 'ProdukController');

Route::resource('makanan', 'MakananController');

Route::resource('minuman', 'MinumanController');

Route::get('pesanan/new', 'MakananController@newSession')->name('pesanan.new');

Route::get('pesanan/data', 'PesananController@listData')->name('pesanan.data');
Route::resource('pesanan', 'PesananController');
