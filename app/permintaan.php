<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    protected $fillable = ['user_fk','pinjam_fk','aset_fk','waktu_pakai','waktu_kembali' ];//field table database
    //
}
