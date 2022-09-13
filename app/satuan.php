<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama_satuan','aktif'/*,stok,dll  */];//field table database
};
