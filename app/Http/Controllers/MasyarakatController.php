<?php

namespace App\Http\Controllers;

use App\Mail\TestSendingEmail;
use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Pengaduan_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Auth::user();
        return view('masyarakat.index');
    }

    public function history()
    {
        $nik = Auth::user()->nik;
        $data_pengaduan =  Pengaduan::where('nik', $nik)->get();
        return view('masyarakat.history', compact('data_pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $input = $request->all();
        $this->validate($request,[

    		'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000|required',
    	]);

        $nik = Auth::user()->nik;
        $email = Auth::user()->email;

        $uniqID = Carbon::now()->timestamp . uniqid();
        $data = new Pengaduan;
        $data->unique_id  = $uniqID;
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        $data->nik = $nik;
        $data->isi_laporan = $request->isi_laporan;
        
        foreach ($request->foto as $key => $image) {
            $pimage = new Pengaduan_image();
            $pimage->pengaduan_unique_id = $uniqID;

            $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
            $request->foto[$key]->move(public_path("images"), $imageName);

            $pimage->foto = $imageName;
            $pimage->save();
        }
        $data->save();
        
        $data_p = [
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'isi_laporan' => $request->isi_laporan

        ];

        Mail::to($email)->send(new TestSendingEmail($data_p));
        return redirect('/masyarakat_pengaduan');
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
        //
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
