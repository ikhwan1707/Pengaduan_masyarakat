<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('hopeUI/assets/images/favicon.ico') }}" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/core/libs.min.css') }}" />
      
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/hope-ui.min.css?v=1.2.0') }}" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/custom.min.css?v=1.2.0') }}" />
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/dark.min.css') }}"/>
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/customizer.min.css') }}" />
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/rtl.min.css') }}"/>
      
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <div class="wrapper">
        <section class="login-content">
           <div class="row m-0 align-items-center bg-white vh-100">            
                 <div class="col-md-5 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                 <img src="{{ asset('hopeUI/assets/images/auth/05.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
              </div>
              <div class="col-md-7">               
                 <div class="row justify-content-center">
                    <div class="col-md-10">
                       <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                          <div class="card-body">
                             <h2 class="mb-2 text-center">Daftar</h2>
                             <p class="text-center">Silahkan Buat Akun Kamu.</p>
                             <form action="{{ route('register') }}" method="POST">
                            @csrf
                                <div class="row">
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="nik" class="form-label">NIK</label>
                                         <input type="number" class="form-control" id="nik" name="nik" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="firstname" class="form-label">Nama Depan</label>
                                         <input type="text" class="form-control" id="firstname" name="firstname" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="lasttname" class="form-label">Nama Belakang</label>
                                         <input type="text" class="form-control" id="lasttname" name="lasttname" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="full-name" class="form-label">Userame</label>
                                         <input type="text" class="form-control" id="full-name" name="name" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="email" class="form-label">Email</label>
                                         <input type="email" class="form-control" id="email" name="email" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="phone" class="form-label">No Handphone</label>
                                         <input type="number" class="form-control" id="phone" name="no_handphone" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="password" class="form-label">Password</label>
                                         <input type="password" class="form-control" id="password" name="password" placeholder=" ">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                      <div class="form-group">
                                         <label for="confirm-password" class="form-label">Konfirmasi Password</label>
                                         <input type="text" class="form-control" id="confirm-password" name="password_confirmation" placeholder=" ">
                                      </div>
                                   </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                   <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                                <p class="mt-3 text-center">
                                  Sudah mempunyai akun <a href="{{ Route('login')}}" class="text-underline">Masuk</a>
                                </p>
                             </form>
                          </div>
                       </div>    
                    </div>
                 </div>  
              </div>   
           </div>
        </section>
        </div>
    
    <!-- Library Bundle Script -->
    <script src="{{ asset('hopeUI/assets/js/core/libs.min.js') }}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{ asset('hopeUI/assets/js/core/external.min.js') }}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{ asset('hopeUI/assets/js/charts/widgetcharts.js') }}"></script>
    
    <!-- mapchart Script -->
    <script src="{{ asset('hopeUI/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('hopeUI/assets/js/charts/dashboard.js') }}"></script>
    
    <!-- fslightbox Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/fslightbox.js') }}"></script>
    
    <!-- Settings Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/setting.js') }}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/slider-tabs.js')}}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/form-wizard.js')}}"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="{{ asset('hopeUI/assets/js/hope-ui.js')}}" defer></script>
  </body>
</html>