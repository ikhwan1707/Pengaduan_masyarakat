<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $provinces = Province::all();
        return view('admin.user.form', compact('user','provinces'));
    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kota...</option>";
        foreach ($regencies as $kota ) {
            $option.= "<option value='$kota->id'>$kota->name</option>";  
        }

        echo$option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan ) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";  
        }

        echo $option;
    }

    public function getKelurahan(Request $request)
    {
        $village_id = $request->village_id;
        $villages = Village::where('district_id', $village_id)->get();

        $option = "<option>Pilih Kelurahan...</option>";
        foreach ($villages as $kelurahan ) {
            $option.= "<option value='$kelurahan->id'>$kelurahan->name</option>";  
        }

        echo $option;
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
        //dd($request);
       /*  $this->validate($request,[
            'jenkel'      => 'required',
            'no_handphone'      => 'required|numeric',	
            'email'       => 'required',
            'password'       => 'required|min:6'
        ]); */

        if ($request->file('foto') == null) {
            $foto = $request->user()->foto;
        }else {
             $foto = $request->file('foto')->store('uploads');
        }
        
        $user = User::find($id);
        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,	
            'no_handphone'      => $request->no_handphone,
            'password'          => bcrypt($request->password),
            'jenkel'	        => $request->jenkel,
            'alamat'            => $request->alamat,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
            'kode_pos'          => $request->kode_pos,	
            'province_id'       => $request->province_id,	
            'regency_id'        => $request->regency_id,	
            'village_id'        => $request->village_id,	
            'district_id'       => $request->district_id,
            'foto'              => $foto
        ]);

        return redirect(route('user_profile'))->with(['Success'=>'Profile berhasil diperbaharui!']);
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
    }
}
