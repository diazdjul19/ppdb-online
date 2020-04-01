<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = User::all();
        return view('dashboard_admin.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_admin.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         // Membuat Validasi Dulu
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

        // Membuat Data User
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_hp = $request->no_hp;
        $data->level = $request->level;
        $data->foto_user = $request->foto_user;
    
        if(isset($request->foto_user)){
            $imageFile = $request->name.'/'.\Str::random(60).'.'.$request->foto_user->getClientOriginalExtension();
            $image_path = $request->file('foto_user')->move(storage_path('app/public/user/'.$request->name), $imageFile);

            $data->foto_user = $imageFile;
        }

        $data->save();
        
        if ($data) {
            return redirect(route('user.index'));
        } else {
            # code...
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('dashboard_admin.user_detail', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('dashboard_admin.user_edit', compact('data'));
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
        $data = User::find($id);
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->no_hp = $request->get('no_hp');
        $data->level = $request->get('level');


        if ($request->password != $request->password_confirmation) {
            \Session::flash('gagal', 'Password Tidak Sama');

            return redirect(route('user.edit', [$data->id ]));
            
        }

        if (isset($request->password)) {
            $data->password = Hash::make($request->password);
        }


        if(isset($request->foto_user)){
            $imageFile = $request->name.'/'.\Str::random(60).'.'.$request->foto_user->getClientOriginalExtension();
            $image_path = $request->file('foto_user')->move(storage_path('app/public/user/'.$request->name), $imageFile);

            $data->foto_user = $imageFile;
        }
        
        $data->save();

        return redirect(route('user.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id)->delete();
        return redirect(route('user.index'));
    }
}
