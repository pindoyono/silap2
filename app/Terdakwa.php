<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terdakwa extends Model
{
    //
    protected $fillable = [
        'nama', 'nik', 'alamat','jenis_kelamin','agama'
    ];
    
}
