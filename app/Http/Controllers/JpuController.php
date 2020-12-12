<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\jpu::orderBy('id','DESC')->get();
        return view('jpu.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("jpu.create");
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
            "nama" => "required",
            "nip" => "required",
            "jabatan" => "required", 
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = new \App\jpu;
        $data->nama = $request->get('nama');
        $data->nip = $request->get('nip');
        $data->jabatan = $request->get('jabatan');
        $data->save();

        return redirect()->route('jpu.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\jpu::findOrFail($id);
        return view('jpu.edit',   ['data' => $data
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
            "nama" => "required",
            "nip" => "required",
            "jabatan" => "required", 
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data =  \App\jpu::findOrFail($id);
        $data->nama = $request->get('nama');
        $data->nip = $request->get('nip');
        $data->jabatan = $request->get('jabatan');
        $data->update();

        return redirect()->route('jpu.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\jpu::findOrFail($id);
        $data->delete();
        return redirect()->route('jpu.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
