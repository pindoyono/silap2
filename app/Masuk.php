<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    //
    protected $fillable = [
        'id','no_terdakwa','terdakwa','jpu','jenis_perkara','no_bb','nama_bb','tgl_masuk'
    ];
}
