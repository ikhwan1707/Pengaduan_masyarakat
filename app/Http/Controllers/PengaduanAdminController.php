<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Mail\SendTanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PengaduanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengaduan = Pengaduan::all()->sortDesc();
        return view('admin.pengaduan.index', compact('data_pengaduan'));
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
        $data_view_pengaduan = Pengaduan::where('id_pengaduan', $id)->get();
        return view('admin.pengaduan.view',compact('data_view_pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_edit_pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        $get_user =  User::where('nik', $data_edit_pengaduan->nik)->first();
        
    
        return view('admin.pengaduan.edit', compact('data_edit_pengaduan','get_user'));
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
        $this->validate($request,[
            'tanggapan' =>  'required|string|'
        ]);

        $data = new Tanggapan;
        $data->id_pengaduan =  $id;
        $data->tgl_tanggapan = Carbon::now()->format('Y-m-d');
        $data->tanggapan = $request->tanggapan;
        $data->user_id = Auth::user()->id;
        $data->save();

        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'proses'
        ]);

        $send_tanggapan = DB::table('tanggapans as T')
        ->select('T.*','P.*','U.name', 'U.email')
        ->join('pengaduans as P', 'T.id_pengaduan', '=', 'P.id_pengaduan')
        ->join('users as U', 'P.nik', '=', 'U.nik')
        ->where('P.id_pengaduan', '=', $id)
        ->first();

        $data_tanggapan = [
            'nik'           => $send_tanggapan->nik,
            'name'          => $send_tanggapan->name, 
            'tgl_pengaduan' => $send_tanggapan->tgl_pengaduan,
            'tgl_tanggapan' => $send_tanggapan->tgl_tanggapan,
            'isi_laporan'   => $send_tanggapan->isi_laporan,
            'tanggapan'     => $send_tanggapan->tanggapan,
            'status'        => $send_tanggapan->status
        ];

        Mail::to($send_tanggapan->email)->send(new SendTanggapan($data_tanggapan));

        return redirect(route('pengaduan'))->with(['success'=>'Berhasil diperbaharui!']);
    }

    public function finish(Request $request, $id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'selesai'
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id_pengaduan', $id)->delete();
        return redirect(route('pengaduan'))->with(['success'=>'Pengaduan berhasil dihapus!']);
    }
}
