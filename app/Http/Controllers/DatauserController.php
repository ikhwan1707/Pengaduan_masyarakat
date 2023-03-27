<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DatauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::all()->sortDesc();
        return view('admin.user.index', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = Auth::user();
        $user_profile = User::where('id', $id)->get();
        $id = User::where('id', $id)->first();
        $provinces = Province::all();
        
       
        //dd($user_profile);
        
        return view('admin.user.edit', compact('user', 'user_profile', 'provinces','id'));
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
        $user = User::find($id);

        if ($request->hasFile('foto') == null) {
            $imgName = $request->user()->foto;
        } else {

            $image_path = public_path("uploads/" . $user->foto);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $foto = $request->file('foto');
            $imgName = $foto->getClientOriginalName();
            $destinationPath = public_path('/uploads/');
            $foto->move($destinationPath, $imgName);
        }
        
        $user->update([
            'nik'               => $request->nik == null ? $user->nik : $request->nik,
            'firstname'         => $request->firstname == null ? $user->firstname : $request->firstname,
            'lasttname'         => $request->lasttname == null ? $user->lasttname : $request->lasttname,
            'name'              => $request->name == null ? $user->name : $request->name,
            'email'             => $request->email == null ? $user->email : $request->email,
            'no_handphone'      => $request->no_handphone == null ? $user->no_handphone : $request->no_handphone,
            'password'          => $request->password == null ? $user->password :  bcrypt($request->password),
            'jenkel'            => $request->jenkel == null ? $user->jenkel : $request->jenkel,
            'alamat'            => $request->alamat == null ? $user->alamat : $request->alamat,
            'rt'                => $request->rt == null ? $user->rt : $request->rt,
            'rw'                => $request->rw == null ? $user->rw : $request->rw,
            'kode_pos'          => $request->kode_pos == null ? $user->kode_pos : $request->kode_pos,
            'province_id'       => $request->province_id == null ? $user->province_id : $request->province_id,
            'regency_id'        => $request->regency_id == null ? $user->regency_id : $request->regency_id,
            'village_id'        => $request->village_id == null ? $user->village_id : $request->village_id,
            'district_id'       => $request->district_id == null ? $user->district_id : $request->district_id,
            'level'             => $request->level == null ? $user->level : $request->level,
            'foto'              => $imgName,
        ]);

        return redirect(route('user'))->with(['Success' => 'Profile berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('user'))->with(['success' => 'User berhasil dihapus!']);
    }
}