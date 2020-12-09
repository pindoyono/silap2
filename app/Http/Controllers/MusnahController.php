<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MusnahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Musnah::orderBy('musnahs.id','DESC')
        ->leftJoin('terdakwas', 'terdakwas.id', '=', 'musnahs.no_bb')
        ->select('musnahs.*','terdakwas.nama as nama_terdakwa')
        ->get();
        return view('musnah.index1', ['data' => $data]);
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

        return view("musnah.create1",['jpu' => $jpu,'terdakwa' => $terdakwa,]);
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
        $data = new \App\Musnah;
        $data->no_bb = $request->get('terdakwa');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->save();

        return redirect()->route('musnah.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Musnah::findOrFail($id);
        $jpu = \App\jpu::orderBy('id','DESC')->get();
        $terdakwa = \App\terdakwa::orderBy('id','DESC')->get();

        return view('musnah.edit1',   ['jpu' => $jpu,'terdakwa' => $terdakwa,'data' => $data
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
        $data = \App\Musnah::findOrFail($id);
        $data->no_bb = $request->get('terdakwa');
        $data->nama_bb = $request->get('nama_bb');
        $data->pp_no = $request->get('pp_no');
        $data->tgl_pp = date('y-m-d',strtotime($request->get('tgl_pp')));
        $data->ppp_no = $request->get('ppp_no');
        $data->tgl_ppp = date('y-m-d',strtotime($request->get('tgl_ppp')));
        $data->update();

        return redirect()->route('musnah.index')->with('success', 'Task Updated Successfully!');
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
        $data = \App\Musnah::findOrFail($id);
        $data->delete();
        return redirect()->route('musnah.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
