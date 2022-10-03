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

    Route::put('/permintaan/approve/{id}', 'PermintaanController@approve');
    Route::put('/permintaan/applied/{id}', 'PermintaanController@applied');
    Route::put('/permintaan/finished/{id}', 'PermintaanController@finished');

    Route::get('/pengguna/list', 'PenggunaController@index');
    Route::get('/pengguna/add', 'PenggunaController@input');
    Route::post('/pengguna/add', 'PenggunaController@prosesInput');
    Route::get('/pengguna/{id}', 'PenggunaController@dataById');
    Route::patch('/pengguna/update/{id}', 'PenggunaController@prosesUpdate');
    Route::delete('/pengguna/delete/{id}', 'PenggunaController@prosesDelete');

    Route::get('/pemeliharaan/list', 'PemeliharaanController@index');
    Route::get('/pemeliharaan/add', 'PemeliharaanController@input');
    Route::post('/pemeliharaan/add', 'PemeliharaanController@prosesInput');
    Route::get('/pemeliharaan/{id}', 'PemeliharaanController@dataById');
    Route::patch('/pemeliharaan/update/{id}', 'PemeliharaanController@prosesUpdate');
    Route::delete('/pemeliharaan/delete/{id}', 'PemeliharaanController@prosesDelete');
});

Route::group(['middleware'=>['auth','cekRole:admin,pegawai']], function(){
    Route::get('/permintaan/list', 'PermintaanController@index');

    // Route::get('/permintaan/list/{id}', 'PermintaanController@byUser');
    Route::get('/permintaan/input', 'PermintaanController@input');
    Route::get('/permintaan/detail/{id}', 'PermintaanController@requestdetail');
    Route::resource('permintaan', PermintaanController::class);
});