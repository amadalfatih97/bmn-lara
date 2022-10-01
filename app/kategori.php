<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama_kategori','ket','aktif'];//field table database
}
