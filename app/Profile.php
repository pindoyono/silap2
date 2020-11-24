<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'dasar_hukum', 'sejarah', 'visi_misi','visi_misi2',
    ];
}
