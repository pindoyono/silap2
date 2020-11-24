<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
use App\School;
use Illuminate\Support\Facades\Hash;
use Auth;

use DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Validator;

class PidumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Masuk::orderBy('id','DESC')->get();
        return view('pidum.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("pidum.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "no_terdakwa" => "required",
            "terdakwa" => "required",
            "jpu" => "required", 
            "jenis_perkara" => "required",
            "no_bb" => "required",
            "nama_bb" => "required",
            "tgl_masuk" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = new \App\Masuk;
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->jpu = $request->get('jpu');
        $data->jenis_perkara = $request->get('jenis_perkara');
        $data->no_bb = $request->get('no_bb');
        $data->nama_bb = $request->get('nama_bb');
        $data->tgl_masuk = date('y-m-d',strtotime($request->get('tgl_masuk')));
        $data->save();

        return redirect()->route('pidum.index')->with('success', 'Task Created Successfully!');
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
        $data = \App\Masuk::findOrFail($id);

        return view('pidum.edit',   ['data' => $data
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
            "jpu" => "required", 
            "jenis_perkara" => "required",
            "no_bb" => "required",
            "nama_bb" => "required",
            "tgl_masuk" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $data = \App\Masuk::findOrFail($id);
        $data->no_terdakwa = $request->get('no_terdakwa');
        $data->terdakwa = $request->get('terdakwa');
        $data->jpu = $request->get('jpu');
        $data->jenis_perkara = $request->get('jenis_perkara');
        $data->no_bb = $request->get('no_bb'); 
        $data->nama_bb = $request->get('nama_bb');
        $data->tgl_masuk = date('y-m-d',strtotime($request->get('tgl_masuk')));
        $data->update();

        return redirect()->route('pidum.index')->with('success', 'Task Update Successfully!');
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
        $data = \App\Masuk::findOrFail($id);
        $data->delete();
        return redirect()->route('pidum.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
