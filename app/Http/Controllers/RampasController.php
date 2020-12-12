<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RampasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Rampas::orderBy('rampas.id','DESC')
        ->leftJoin('terdakwas', 'terdakwas.id', '=', 'rampas.terdakwa')
        ->select('rampas.*','terdakwas.nama as nama_terdakwa')
        ->get();
        return view('rampas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jpu = \App\jpu::orderBy('id','DESC')->get();
        $terdakwa = \App\terdakwa::orderBy('id','DESC')->get();
        return view("rampas.create",['jpu' => $jpu,'terdakwa' => $terdakwa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validator = Validator::make($request->all(), [
            "no_terdakwa" => "required",
            "terdakwa" => "required",
            "no_bb" => "required",
            "nama_bb" => "required", 
            "pp_no" => "required",
            "tgl_pp" => "required",
            "ppp_no" => "required",
            "tgl_ppp" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = new \App\Rampas;
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->no_bb = $request->get('no_bb');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->save();

        return redirect()->route('rampas.index')->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = \App\Rampas::findOrFail($id);
        $jpu = \App\jpu::orderBy('id','DESC')->get();
        $terdakwa = \App\terdakwa::orderBy('id','DESC')->get();
        return view('rampas.edit',   ['data' => $data,'jpu' => $jpu,'terdakwa' => $terdakwa
                                    ]
                                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "no_terdakwa" => "required",
            "terdakwa" => "required",
            "no_bb" => "required",
            "nama_bb" => "required", 
            "pp_no" => "required",
            "tgl_pp" => "required",
            "ppp_no" => "required",
            "tgl_ppp" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = \App\Rampas::findOrFail($id);
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->no_bb = $request->get('no_bb');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->update();

        return redirect()->route('rampas.index')->with('success', 'Task Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = \App\Rampas::findOrFail($id);
        $data->delete();
        return redirect()->route('rampas.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
