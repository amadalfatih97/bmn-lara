<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailPinjam extends Model
{
    // public $timestamps = false;
    protected $fillable = ['kode','user_fk','waktu_req','waktu_proses','status','ket' ];//field table database
}
