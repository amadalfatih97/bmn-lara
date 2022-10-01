<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $fillable = ['user_fk','aset_fk','permintaan_fk','perihal','waktu_mulai','waktu_selesai','ket' ];//field table database
}
