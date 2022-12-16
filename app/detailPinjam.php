<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailPinjam extends Model
{
    protected $fillable = ['permintaan_fk','aset_fk','qty'];//field table database
}
