@extends('admin.layouts.app')
@section('content')
<div class="conatiner">
    <div class="row">
        <div class="col-lg-6">
            <div class="profile-content tab-content">
                <div id="profile-feed" class="tab-pane fade active show">
                    <div class="card">
                        
                        <div class="card-header d-flex align-items-center justify-content-between pb-4">
                            <div class="header-title">
                                <div class="d-flex flex-wrap">
                                    <div class="media-support-user-img me-3">
                                        <img class="rounded-pill img-fluid avatar-60 bg-soft-danger p-2 ps-2"
                                            src="{{ asset('uploads/'.$get_user->foto) }}" alt="">
                                    </div>
                                    <div class="media-support-info mt-2">
                                        <h5 class="mb-0">{{ $get_user->name}}</h5>
                                        <p class="mb-0 text-primary">{{ $data_edit_pengaduan->nik}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="user-post">
                                @php
                                $foto = App\Models\Pengaduan_Image::where('pengaduan_unique_id',
                                $data_edit_pengaduan->unique_id)->get();
                                @endphp

                                @foreach($foto as $item)
                                <a href="{{ asset('images/'. $data_edit_pengaduan->foto) }}/{{$item->foto}}"
                                    target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('images/'. $data_edit_pengaduan->foto) }}/{{$item->foto}}"
                                        height="30%" width="30%" alt="post-image" class="img-fluid">
                                </a>
                                @endforeach
                            </div>
                            <div class="comment-area p-3">
                                <hr>
                                <p>
                                    {{ $data_edit_pengaduan->isi_laporan}}
                                </p>
                                <hr>
                                <form class="comment-text d-flex align-items-center mt-3"
                                    action="{{ route('pengaduan.update', $data_edit_pengaduan->id_pengaduan) }}"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id_pengaduan" value="{{ $data_edit_pengaduan->id_pengaduan }}">
                                    
                                    <input type="text" class="form-control rounded" name="tanggapan"
                                        placeholder="Tanggapan">
                                    <div class="comment-attagement d-flex">
                                        <button class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Delete">
                                            <span class="btn-inner">
                                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                                <p class="text-danger">{{ $errors->first('id_pengaduan') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection