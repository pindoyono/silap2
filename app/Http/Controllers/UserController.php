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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::orderBy('id','DESC')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        // $sekolah = \App\Sekolah::all();
        return view("users.create", ['roles' => $roles,
                                    // 'sekolahs' => $sekolah
                                    ]);
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
            "name" => "required|min:5|max:100",
            "role" => "required", 
            "email" => "required|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->assignRole($request->get('role'));
        $new_user->givePermissionTo($request->get('role'));

        $new_user->save();

        return redirect()->route('users.index')->with('success', 'Task Created Successfully!');
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
        $user = \App\User::findOrFail($id);
        $roles = Role::all();


        return view('users.edit',   ['user' => $user,
                                    'roles' => $roles
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
            "name" => "required|min:5|max:100",
            "role" => "required",
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->get('password') ){
            $user->password = \Hash::make($request->get('password'));
        }

        $user->update();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->get('role'));
        DB::table('model_has_permissions')->where('model_id',$id)->delete();
        $user->givePermissionTo($request->get('role'));


        return redirect()->route('users.index', [$id])->with('success', 'Berhasil Merubah Data Pengguna');
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
        $user = \App\User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
}
