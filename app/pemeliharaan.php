<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemeliharaan extends Model
{
    protected $fillable = [
        'barang_fk','tgl_pemeliharaan','kondisi_sebelum','tindakan',
        'pelaksana','src_bukti'
    ];
}
