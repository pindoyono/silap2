<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Kembali::orderBy('kembalis.id','DESC')
        ->leftJoin('terdakwas', 'terdakwas.id', '=', 'kembalis.terdakwa')
        ->select('kembalis.*','terdakwas.nama as nama_terdakwa')
        ->get();
        return view('kembali.index1', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = \App\Masuk::orderBy('id','DESC')->get();
        $jpu = \App\jpu::orderBy('id','DESC')->get();
        $terdakwa = \App\terdakwa::orderBy('id','DESC')->get();

        return view("kembali.create1",['jpu' => $jpu,'terdakwa' => $terdakwa]);
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
            "hari_serah" => "required",
            "tgl_serah" => "required",
            "no_terdakwa" => "required|unique:kembalis",
            "terdakwa" => "required",
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
        $data = new \App\Kembali;
        $data->hari_serah = $request->get('hari_serah');
        $data->tgl_serah = date('y-m-d',strtotime($request->get('tgl_serah')));
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->save();

        return redirect()->route('kembali.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Kembali::findOrFail($id);
        $jpu = \App\jpu::orderBy('id','DESC')->get();
        $terdakwa = \App\terdakwa::orderBy('id','DESC')->get();

        return view('kembali.edit1',   ['jpu' => $jpu,'terdakwa' => $terdakwa,'data' => $data
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
        //
        $validator = Validator::make($request->all(), [
            "hari_serah" => "required",
            "tgl_serah" => "required",
            "no_terdakwa" => "required",
            "terdakwa" => "required",
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
        $data = \App\Kembali::findOrFail($id);
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->hari_serah = $request->get('hari_serah');
        $data->tgl_serah = date('y-m-d',strtotime($request->get('tgl_serah')));
        $data->update();

        return redirect()->route('kembali.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Kembali::findOrFail($id);
        $data->delete();
        return redirect()->route('kembali.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
