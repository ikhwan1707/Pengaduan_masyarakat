@extends('admin.layouts.app') 
@section('content')
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <div class="d-flex flex-wrap align-items-center justify-content-between">
               <div class="d-flex flex-wrap align-items-center">
                  <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                     <img src="{{ asset('uploads/'.$user->foto) }}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                     </div>
                  <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                     <h4 class="me-2 h4"> {{ $user->firstname.' '.$user->lasttname}}</h4>
                     <span> - {{ $user->email}}</span>
                  </div>
               </div>
               <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active show" data-bs-toggle="tab" href="#profile-detail" role="tab" aria-selected="false">Profil Detail</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#profile-update" role="tab" aria-selected="false">Perbarui Profil</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-lg-12">
   <div class="profile-content tab-content">
      @include('sweetalert::alert')
      @if (session('Success'))
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
         </svg>
         <div class="alert alert-success d-flex  alert-dismissible fade show" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#exclamation-triangle-fill" />
         </svg>
         {{ session('Success') }}
         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      <div id="profile-detail" class="tab-pane fade active show">
         <div class="card">
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Profil Detail</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="mt-2">
                  <h6 class="mb-1">NIK:</h6>
                  <p>{{ $user->nik}}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Nama Lengkap:</h6>
                  <p>{{ $user->firstname . ' ' .  $user->lasttname}}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Username:</h6>
                  <p>{{ $user->name}}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Email:</h6>
                  <p>{{ $user->email }}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">No Handphone:</h6>
                  <p>{{ $user->no_handphone}}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Jenis Kelamin:</h6>
                  <p>{{ $user->jenkel }}</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Alamat:</h6>
                  <p>@if ($user->alamat ) {{$user->alamat}} @else Silahkan Perbaharui @endif</p>
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Provinsi:</h6>
                  @foreach ($user_profile as $v)
                     <p>@if ($user->province_id) {{$v->province->name}} @else Silahkan Perbaharui @endif</p>
                  @endforeach
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Kota:</h6>
                  @foreach ($user_profile as $v) 
                    <p>@if ($user->regency_id) {{ $v->regencies->name}} @else Silahkan Perbaharui @endif</p>
                 @endforeach
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Kecamatan:</h6>
                  @foreach ( $user_profile as $v )
                     <p>@if ($user->village_id) {{ $v->village->name}} @else Silahkan Perbaharui @endif</p>
                  @endforeach
               </div>
               <div class="mt-2">
                  <h6 class="mb-1">Kelurahan:</h6>
                  @foreach ( $user_profile as $v )
                     <p>@if ($user->district_id) {{ $v->district->name}} @else Silahkan Perbaharui @endif</p>
                  @endforeach
               </div>
            </div>
      </div>
   </div>

   <div id="profile-update" class="tab-pane fade">
      <form method="POST" action="{{ route('user_profile.update', $user->id) }}" enctype="multipart/form-data">
         @csrf 
         <input type="hidden" name="_method" value="PUT"> 
         <div class="row">
            
               <div class="col-xl-4 col-lg-4">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Perbaharui Profil</h4>
                        </div>
                     </div>
                     <div class="card-body">
                           <div class="form-group">
                              <div class="profile-img-edit position-relative">
                                 <img src="{{ asset('uploads/'.$user->foto) }}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100" id="preview">
                                 
                              </div></br>
                              
                              <input type="file" class="form-control" name="foto" accept="image/*" id="inputGambar_profile" >

                              <div class="img-extension mt-3">
                              <div class="d-inline-block align-items-center">
                                 <span>Only</span>
                                 <a href="javascript:void();">.jpg</a>
                                 <a href="javascript:void();">.png</a>
                                 <a href="javascript:void();">.jpeg</a>
                                 <span>allowed</span>
                              </div>
                           </div>
                           </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Informasi Profil</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="new-user-info">
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="nik">NIK</label>:</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" >
                                    
                                    @if ($errors->has('nik'))
                                       <div class="text-danger">
                                          {{ $errors->first('nik') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="firstname">Nama Depan</label>:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nama Depan" >
                                    
                                    @if ($errors->has('firstname'))
                                       <div class="text-danger">
                                          {{ $errors->first('firstname') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="lasttname">Nama Belakang:</label>
                                    <input type="text" class="form-control" id="lasttname" name="lasttname" placeholder="Nama Belakang">
                                    @if ($errors->has('lastname'))
                                       <div class="text-danger">
                                          {{ $errors->first('lastname') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="name">Username:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    @if ($errors->has('name'))
                                       <div class="text-danger">
                                          {{ $errors->first('name') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label class="form-label">Jenis Kelamin:</label>
                                    <select name="jenkel" class="selectpicker form-control" data-style="py-0">
                                       <option value="Laki-Laki">Laki-Laki</option>
                                       <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @if ($errors->has('jenkel'))
                                       <div class="text-danger">
                                          {{ $errors->first('jenkel') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="no_handphone">No Handphone:</label>
                                    <input type="number" class="form-control" name="no_handphone" id="no_handphone" placeholder="Mobile Number">
                                    @if ($errors->has('no_handphone'))
                                       <div class="text-danger">
                                          {{ $errors->first('no_handphone') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                       <div class="text-danger">
                                          {{ $errors->first('email') }}
                                       </div>
                                    @endif
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="alamat">Alamat:</label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="province_id">Provinsi:</label>
                                    <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                       <option value="">Pilih Provinsi...</option>
                                       @foreach ( $provinces as $provinsi)
                                          <option value="{{ $provinsi->id}}">{{ $provinsi->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="regency_id">Kota:</label>
                                    <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0">
                                    
                                 </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="village_id">Kecamatan:</label>
                                    <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0">
                                    
                                 </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="district_id">Kelurahan:</label>
                                    <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0">
                                    
                                 </select>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="rt">RT:</label>
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="RT">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="kode_pos">RW:</label>
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="RW">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="kode_pos">Kode Pos:</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                                 </div>
                              </div>
                              <hr>
                              <h5 class="mb-3">Keamanan</h5>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="password_confirmation">Konfirmasi Password:</label>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Repeat Password ">
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Ubah data</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script>
   $(function () {
      $('#province_id').on('change', function(){
         let province_id = $('#province_id').val();
         
         if (province_id) {
            $.ajax({
               url: "{{ route('getKota')}}",
               type: "POST",
               data : { province_id:province_id },
               cache: false,

               success:function($msg){
                  $('#regency_id').html($msg);
                  $('#village_id').html('');
                  $('#district_id').html('');
                },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })

      $('#regency_id').on('change', function(){
         let regency_id = $('#regency_id').val();
         if (regency_id) {
            $.ajax({
               url: "{{ route('getKecamatan')}}",
               type: "POST",
               data : { regency_id:regency_id },
               cache: false,

               success:function($msg){
                  $('#village_id').html($msg);
                  $('#district_id').html('');
               },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })

      $('#village_id').on('change', function(){
         let village_id = $('#village_id').val();
         if (village_id) {
            $.ajax({
               url: "{{ route('getKelurahan')}}",
               type: "POST",
               data : { village_id:village_id },
               cache: false,

               success:function($msg){
                  $('#district_id').html($msg);
               },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })

      $('#inputGambar_profile').on('change',function(){
        //get the file name
          var fileName = $(this).val();
          var panjangnamafile = fileName.length;
          
          if (panjangnamafile > 22){
            hasilpotong = fileName.substring(0, 22);
            $(this).next('.custom-file-label').html(hasilpotong);
          }else{
            $(this).next('.custom-file-label').html(fileName);
          }
      })

      function filePreview(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               $('#preview').attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
         }
      }

      $(function(){
         $("#inputGambar_profile").change(function () {
            filePreview(this);
         });
      });
   });
</script>
@endsection
