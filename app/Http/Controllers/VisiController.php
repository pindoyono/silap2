<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class VisiController extends Controller
{
    //
    public function sejarah()
    {
        $data = \App\Profile::find(1);
        
        return view('sejarah', ['data' => $data]);
    }

    public function sejarah_edit()
    {
        $data = \App\Profile::find(1);
        return view('sejarah_edit', ['data' => $data]);
    }

    public function sejarah_simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "sejarah" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = \App\Profile::findOrFail(1);
        $data->sejarah = $request->get('sejarah');
        $data->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('sejarah')->with('success', 'Data Berhasil Di Ubah');
    }

    public function dasar()
    {
        $data = \App\Profile::find(1);
        return view('dasarhukum', ['data' => $data]);
    }

    public function dasar_edit()
    {
        $data = \App\Profile::find(1);
        return view('dasarhukum_edit', ['data' => $data]);
    }

    public function dasar_simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "dasar_hukum" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = \App\Profile::findOrFail(1);
        $data->dasar_hukum = $request->get('dasar_hukum');
        $data->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('dasar')->with('success', 'Data Berhasil Di Ubah');
    }

    public function visi()
    {
        $data = \App\Profile::find(1);
        return view('visi', ['data' => $data]);
    }

    public function visi_edit()
    {
        $data = \App\Profile::find(1);
        return view('visi_edit', ['data' => $data]);
    }

    public function visi_simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "visi" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = \App\Profile::findOrFail(1);
        $data->visi_misi = $request->get('visi');
        $data->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('visi')->with('success', 'Data Berhasil Di Ubah');
    }
    
    public function misi()
    {
        $data = \App\Profile::find(1);
        return view('misi', ['data' => $data]);
    }

    public function misi_edit()
    {
        $data = \App\Profile::find(1);
        return view('misi_edit', ['data' => $data]);
    }

    public function misi_simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "misi" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = \App\Profile::findOrFail(1);
        $data->visi_misi2 = $request->get('misi');
        $data->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('misi')->with('success', 'Data Berhasil Di Ubah');
    }
}
