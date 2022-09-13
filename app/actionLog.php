<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actionLog extends Model
{
    protected $fillable = [
        'trans_fk','type','user_fk' 
    ];
}
