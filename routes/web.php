<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::get('/sejarah', 'VisiController@sejarah')->name('sejarah');
Route::get('/sejarah_edit', 'VisiController@sejarah_edit')->name('sejarah_edit');
Route::put('/sejarah_simpan','VisiController@sejarah_simpan')->name('sejarah_simpan')->middleware('role:admin');

Route::get('/dasar', 'VisiController@dasar')->name('dasar');
Route::get('/dasar_edit', 'VisiController@dasar_edit')->name('dasar_edit');
Route::put('/dasar_simpan','VisiController@dasar_simpan')->name('dasar_simpan')->middleware('role:admin');

Route::get('/visi', 'VisiController@visi')->name('visi');
Route::get('/visi_edit', 'VisiController@visi_edit')->name('visi_edit');
Route::put('/visi_simpan','VisiController@visi_simpan')->name('visi_simpan')->middleware('role:admin');

Route::get('/misi', 'VisiController@misi')->name('misi');
Route::get('/misi_edit', 'VisiController@misi_edit')->name('misi_edit');
Route::put('/misi_simpan','VisiController@misi_simpan')->name('misi_simpan')->middleware('role:admin');



Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function () {
        return view('home');
    });
    Route::resources(['users' => 'UserController',]);
    Route::resources(['pidum' => 'PidumController',]);
    Route::resources(['kembali' => 'KembaliController',]);
    Route::resources(['rampas' => 'RampasController',]);
    Route::resources(['musnah' => 'MusnahController',]);
    Route::get('/export', 'ExportController@masuk')->name('export_masuk');
    Route::get('/export1', 'ExportController@musnah')->name('export_musnah');
    Route::get('/export2', 'ExportController@kembali')->name('export_kembali');
    Route::get('/export3', 'ExportController@rampas')->name('export_rampas');
    Route::get('/export4/{id}', 'ExportController@createPDF')->name('export_pdf');
});