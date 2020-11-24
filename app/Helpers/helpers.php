<?php
   
function customTanggal($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
    
function customImagePath($image_name)
{
    return public_path('folder_kamu/sub_folder_kamu/'.$image_name);
}

if (! function_exists('masuk')) {
    function masuk()
    {
        $data = \App\Masuk::count();
		return $data;
    }
}

if (! function_exists('musnah')) {
    function musnah()
    {
        $data = \App\Musnah::count();
		return $data;
    }
}

if (! function_exists('kembali')) {
    function kembali()
    {
        $data = \App\Kembali::count();
		return $data;
    }
}

if (! function_exists('rampas')) {
    function rampas()
    {
        $data = \App\Rampas::count();
		return $data;
    }
}