<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    protected $fillable = [
        'user_fk',
        'kegunaan',
        'keluar',
        'jadwal_pakai',
        'lama',
        'masuk',
        'status',
        'ket',
        'img'
    ];//field table database

}
