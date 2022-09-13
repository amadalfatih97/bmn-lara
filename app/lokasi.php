<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama_lokasi','aktif'];//field table database
}
