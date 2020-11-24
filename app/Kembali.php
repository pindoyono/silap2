<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    //
    protected $fillable = [ 
        'no_terdakwa','terdakwa','no_bb','nama_bb','pp_no','tgl_pp','ppp_no','tgl_ppp','hari_serah','tgl_serah'
    ];
}
