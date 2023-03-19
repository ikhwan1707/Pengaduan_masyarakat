@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('masyarakat_pengaduan.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-11 col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Pengaduan Masyarakat</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class="form-label" for="tgl_pengaduan">Tanggal
                                                    Pengaduan</label>:</label>
                                                <input type="date" class="form-control" id="tgl_pengaduan"
                                                    name="tgl_pengaduan">

                                                @if ($errors->has('tgl_pengaduan'))
                                                <div class="text-danger">
                                                    {{ $errors->first('tgl_pengaduan') }}
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group col-12">
                                                <label class="form-label" for="isi_laporan">Isi
                                                    Pengaduan</label>:</label>
                                                <textarea class="form-control" id="isi_laporan" name="isi_laporan"
                                                    rows="10"></textarea>

                                                @if ($errors->has('isi_laporan'))
                                                <div class="text-danger">
                                                    {{ $errors->first('isi_laporan') }}
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group col-12">
                                                <label class="form-label" for="foto">Foto Pengaduan</label>:</label>
                                                <input type="file" class="form-control" id="select-image" name="foto[]"
                                                    multiple />
                                                </br>
                                                <div class="filearray">
                                                </div>
                                                @if ($errors->has('foto'))
                                                <div class="text-danger">
                                                    {{ $errors->first('foro') }}
                                                </div>
                                                @endif
                                            </div>


                                            <div class="form-group col-6">
                                                <button type="submit" class="btn btn-primary">Kirim
                                                    Pengaduan</button>
                                                <button type="reset" class="btn btn-danger">Batal Pengaduan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection