<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TerdakwaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Terdakwa::orderBy('id','DESC')->get();
        return view('terdakwa.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("terdakwa.create");
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
            "nik" => "required|unique:terdakwas",
            "alamat" => "required", 
            "jenis_kelamin" => "required",
            "agama" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = new \App\Terdakwa;
        $data->nama = $request->get('nama');
        $data->nik = $request->get('nik');
        $data->alamat = $request->get('alamat');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->save();

        return redirect()->route('terdakwa.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Terdakwa::findOrFail($id);

        return view('terdakwa.edit',   ['data' => $data
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
            "nama" => "required",
            "nik" => "required|unique:terdakwas",
            "alamat" => "required", 
            "jenis_kelamin" => "required",
            "agama" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = \App\Terdakwa::findOrFail($id);
        $data->nama = $request->get('nama');
        $data->nik = $request->get('nik');
        $data->alamat = $request->get('alamat');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->update();

        return redirect()->route('terdakwa.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Terdakwa::findOrFail($id);
        $data->delete();
        return redirect()->route('terdakwa.index')->with('success', 'Berhasil Menghapus data Terdakwa');
    }
}
