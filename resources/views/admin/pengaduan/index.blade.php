@extends('admin.layouts.app')
@section('content')
<div class="conatiner">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if (Session::has('success'))
                <div class="alert alert-success d-flex  alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">List Pengaduan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Isi Pengaduan</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status Pengaduan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $data_pengaduan as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->nik }} </td>
                                    <td>{{ $v->isi_laporan }}</td>
                                    <td>{{ $v->tgl_pengaduan }}</td>
                                    <td>
                                        @if($v->status == '0')
                                        <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                        @elseif ($v->status == 'proses')
                                        <span class="badge bg-info">Sedang Proses</span>
                                        @else
                                        <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <form action="{{ route('pengaduan.destroy', $v->id_pengaduan) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">

                                                <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip"
                                                    data-placement="top" title="View" data-original-title="View"
                                                    href="{{ route('pengaduan.view', $v->id_pengaduan)}}">
                                                    <span class="btn-inner">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>

                                                @if($v->status == '0')
                                                <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip"
                                                    data-placement="top" title="Beri tanggapan" data-original-title="Edit"
                                                    href="{{ route('pengaduan.edit', $v->id_pengaduan)}}">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                @endif

                                                @if($v->status == 'proses')

                                                <a class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip"
                                                    data-placement="top" title="Selesai" data-original-title="Edit"
                                                    href="{{ route('pengaduan.status', $v->id_pengaduan)}}">
                                                    <span class="btn-inner">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                @endif



                                                <button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus" data-original-title="Delete">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path
                                                                d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection