<?php

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
// Auth::routes();


Route::get('/login', 'UserController@login')->name('login');
Route::post('/proseslogin', 'UserController@prosesLogin')->name('proseslogin');
Route::post('/logout', 'UserController@prosesLogot')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/', 'BarangController@index');

Route::group(['middleware'=>['auth','cekRole:admin']], function(){
    Route::get('/user/list', 'UserController@index');
    Route::get('/user/add', 'UserController@input');
    Route::post('/user/add', 'UserController@prosesInput');
    Route::get('/user/{id}', 'UserController@dataById');
    Route::patch('/user/update/{id}', 'UserController@prosesUpdate');
    Route::delete('/user/delete/{id}', 'UserController@prosesDelete');
    
    // Route::get('/', 'BarangController@index')->name('home');
    Route::get('/barang/list', 'BarangController@index');
    Route::get('/barang/add', 'BarangController@input');
    Route::post('/barang/add', 'BarangController@prosesInput');
    Route::post('/barang/masuk', 'BarangController@barangMasuk');
    Route::get('/barang/{id}', 'BarangController@dataById');
    Route::get('/barang/view/{key}', 'BarangController@byItem');
    Route::patch('/barang/update/{id}', 'BarangController@prosesUpdate');
    Route::get('/barang/riwayat/{id}', 'BarangController@riwayat');
    Route::delete('/barang/delete/{id}/{key}', 'BarangController@prosesDelete');

    Route::get('/join', 'BarangController@join');

    Route::get('/setting/satuan/list', 'SatuanController@index');
    Route::get('/setting/satuan/add', 'SatuanController@input');
    Route::post('/satuan/add', 'SatuanController@prosesInput');
    Route::get('/setting/satuan/{id}', 'SatuanController@dataById');
    Route::patch('/satuan/update/{id}', 'SatuanController@prosesUpdate');
    Route::delete('/satuan/delete/{id}', 'SatuanController@prosesDelete');

    Route::get('/setting/lokasi/list', 'LokasiController@index');
    Route::get('/setting/lokasi/add', 'LokasiController@input');
    Route::post('/lokasi/add', 'LokasiController@prosesInput');
    Route::get('/setting/lokasi/{id}', 'LokasiController@dataById');
    Route::patch('/lokasi/update/{id}', 'LokasiController@prosesUpdate');
    Route::delete('/lokasi/delete/{id}', 'LokasiController@prosesDelete');

    Route::get('/setting/kategori/list', 'KategoriController@index');
    Route::get('/setting/kategori/add', 'KategoriController@input');
    Route::post('/kategori/add', 'KategoriController@prosesInput');
    Route::get('/setting/kategori/{id}', 'KategoriController@dataById');
    Route::patch('/kategori/update/{id}', 'KategoriController@prosesUpdate');
    Route::delete('/kategori/delete/{id}', 'KategoriController@prosesDelete');

    Route::get('/pemeliharaan/list', 'PemeliharaanController@index');
    // Route::get('/pemeliharaan/add', 'PemeliharaanController@input');
    Route::post('/pemeliharaan/add', 'PemeliharaanController@prosesInput');
    Route::get('/pemeliharaan/riwayat/{id}', 'BarangController@pemeliharaan');
});

Route::group(['middleware'=>['auth','cekRole:admin,pegawai']], function(){
    Route::get('/findstok', 'BarangController@findstok');
    Route::get('/findname', 'BarangController@findByName');
    Route::get('/find-kode', 'BarangController@getKodeKtg');
    Route::get('/keluhan/list', 'KeluhanController@index');
    Route::get('/keluhan/add', 'KeluhanController@input');
    Route::post('/keluhan/add', 'KeluhanController@prosesInput');
    Route::get('/keluhan-detail/{id}', 'KeluhanController@dataById');
    Route::put('/keluhan/accept/{id}', 'KeluhanController@accept');
    Route::delete('/keluhan/delete/{id}', 'KeluhanController@prosesDelete');
    Route::patch('/keluhan/proses/{id}', 'KeluhanController@proses');

    Route::get('/permintaan/list', 'PermintaanController@index');

});