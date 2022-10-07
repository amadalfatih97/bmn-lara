<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'kode','nama_barang','jenis','satuan_fk','stok','lokasi_fk','kondisi','status','ket','aktif' 
    ];//field table database
}
