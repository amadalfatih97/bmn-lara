<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    protected $fillable = ['kode','user_fk','perihal','waktu_proses','waktu_pakai','waktu_kembali','status','ket' ];//field table database
    //
}
