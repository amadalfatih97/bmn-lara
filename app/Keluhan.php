<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    public $timestamps = false;
    protected $fillable = ['aset_fk','user_fk','ket','status','created_at'];//field table database
}
