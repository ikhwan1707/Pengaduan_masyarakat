<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Pengaduan Masyarakat') }}</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{ asset('hopeUI/assets/images/favicon.ico') }}" />

   <!-- Library / Plugin Css Build -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/core/libs.min.css') }}" />


   <!-- Hope Ui Design System Css -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/hope-ui.min.css?v=1.2.0') }}" />

   <!-- Custom Css -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/custom.min.css?v=1.2.0') }}" />

   <!-- Dark Css -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/dark.min.css') }}" />

   <!-- Customizer Css -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/customizer.min.css') }}" />

   <!-- RTL Css -->
   <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/rtl.min.css') }}" />

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
   <!-- loader Start -->

   <!-- loader END -->

   <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-7">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     @if (session('error'))

                     <div class="alert alert-warning d-flex  alert-dismissible fade show" role="alert">

                        {{ session('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                           aria-label="Close"></button>
                     </div>


                     @endif
                     @if (Session::has('success'))
                     <div class="alert alert-success d-flex  alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                           aria-label="Close"></button>
                     </div>
                     @endif

                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">

                           <h2 class="mb-2 text-center">Masuk</h2>
                           <p class="text-center">Silahkan Masuk dengan akun Anda.</p>
                           <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="name" class="form-label">Username atau Email</label>
                                       <input id="name" type="name"
                                          class="form-control @error('name') is-invalid @enderror" name="name"
                                          value="{{ old('name') }}" required autofocus>

                                       @error('name')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input id="password" type="password"
                                          class="form-control @error('password') is-invalid @enderror" name="password"
                                          required autocomplete="current-password">

                                       @error('password')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       {{-- <input type="checkbox" class="form-check-input" id="customCheck1">
                                       <label class="form-check-label" for="customCheck1">Remember Me</label> --}}
                                    </div>
                                    <a href="{{ route('password.request')}}">Lupa Kata Sandi?</a>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Masuk</button>
                              </div>
                              <p class="mt-3 text-center">
                                 Belum mempunyai akun? <a href="{{ Route('registration')}}" class="text-underline">Klik
                                    disini untuk daftar.</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="{{ asset('hopeUI/assets/images/auth/01.png') }}"
                  class="img-fluid gradient-main animated-scaleX" alt="images">
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