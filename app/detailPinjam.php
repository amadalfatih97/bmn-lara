<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailPinjam extends Model
{
    // public $timestamps = false;
    protected $fillable = ['pinjam_fk','qty','aset_fk','waktu_pakai','waktu_kembali' ];//field table database
}
