<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemeliharaan extends Model
{
    protected $fillable = ['aset_fk','kode','keluhan','hasil','waktu_pelaksanaan','tindak_lanjut','ket','img' ];//field table database

}
