<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'nama_barang','kode_bmn','kode_item','merek',
        'kategori_fk','keyword','satuan_fk','lokasi_fk',
        'tgl_perolehan','kondisi','status','type',
        'pemeliharaan_terakhir','jadwal_service','ket',
        'img','aktif' 
    ];//field table database
}
