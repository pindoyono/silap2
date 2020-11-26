<?php

namespace App\Exports;

use App\Kembali;
use Maatwebsite\Excel\Concerns\FromCollection;

class KembaliExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kembali::all();
    }
}
