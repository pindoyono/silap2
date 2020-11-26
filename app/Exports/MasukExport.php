<?php

namespace App\Exports;

use App\Masuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masuk::all();
    }
}
