<?php

namespace App\Exports;

use App\Musnah;
use Maatwebsite\Excel\Concerns\FromCollection;

class MusnahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Musnah::all();
    }
}
