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
Auth::routes();

Route::get('/', 'BarangController@index')->name('home');
Route::get('/barang/list', 'BarangController@index');
Route::get('/barang/add', 'BarangController@input');
Route::post('/barang/add', 'BarangController@prosesInput');
Route::get('/barang/{id}', 'BarangController@dataById');
Route::patch('/barang/update/{id}', 'BarangController@prosesUpdate');
Route::delete('/barang/delete/{id}', 'BarangController@prosesDelete');


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

Route::get('/permintaan/list', 'PermintaanController@index');
Route::get('/permintaan/input', 'PermintaanController@input');
Route::resource('permintaan', PermintaanController::class);


Route::get('/home', 'HomeController@index')->name('home');
