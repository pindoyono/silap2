<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MasukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MusnahExport;
use App\Exports\KembaliExport;
use App\Exports\RampasExport;


use PDF;

class ExportController extends Controller
{
    //
    public function masuk()
	{
        return Excel::download(new MasukExport, 'masuk.xlsx');
    }
    public function musnah()
	{
        return Excel::download(new MusnahExport, 'musnah.xlsx');
    }
    public function kembali()
	{
        return Excel::download(new KembaliExport, 'kemabali.xlsx');
    }
    public function rampas()
	{
        return Excel::download(new RampasExport, 'rampas.xlsx');
    }

    public function createPDF($id) {
        // retreive all records from db
        $data = \App\Rampas::find($id);
  
        $pdf = PDF::loadView('pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
      }
  
}
