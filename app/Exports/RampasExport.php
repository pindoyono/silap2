<?php

namespace App\Exports;

use App\Rampas;
use Maatwebsite\Excel\Concerns\FromCollection;

class RampasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rampas::all();
    }
}
