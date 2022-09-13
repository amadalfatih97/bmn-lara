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

Route::get('/', 'BarangController@index');
Route::get('/barang/list', 'BarangController@index');
Route::get('/barang/add', 'BarangController@input');
Route::post('/barang/add', 'BarangController@prosesInput');
Route::get('/barang/{id}', 'BarangController@dataById');
Route::patch('/barang/update/{id}', 'BarangController@prosesUpdate');
Route::delete('/barang/delete/{id}', 'BarangController@prosesDelete');


Route::get('/join', 'BarangController@join');



Route::get('/satuan/list', 'SatuanController@index');
Route::get('/satuan/add', 'SatuanController@input');
Route::post('/satuan/add', 'SatuanController@prosesInput');
Route::get('/satuan/{id}', 'SatuanController@dataById');
Route::patch('/satuan/update/{id}', 'SatuanController@prosesUpdate');
Route::delete('/satuan/delete/{id}', 'SatuanController@prosesDelete');

Route::get('/lokasi/list', 'LokasiController@index');
Route::get('/lokasi/add', 'LokasiController@input');
Route::post('/lokasi/add', 'LokasiController@prosesInput');
Route::get('/lokasi/{id}', 'LokasiController@dataById');
Route::patch('/lokasi/update/{id}', 'LokasiController@prosesUpdate');
Route::delete('/lokasi/delete/{id}', 'LokasiController@prosesDelete');

Route::get('/permintaan/list', 'PermintaanController@index');
Route::resource('permintaan', PermintaanController::class);
