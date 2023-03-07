
<!doctype html>

<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Pengaduan Masyakrat') }}</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('hopeUI/assets/images/favicon.ico') }} " />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/core/libs.min.css') }} " />
      
      <!-- Aos Animation Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/vendor/aos/dist/aos.css') }} " />
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/hope-ui.min.css?v=1.2.0') }} " />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/custom.min.css?v=1.2.0') }} " />
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/dark.min.css') }} "/>
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/customizer.min.css') }} " />
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{ asset('hopeUI/assets/css/rtl.min.css') }} "/>
      
  </head>
  <body class="  ">
    <!-- loader Start -->
    
    <!-- loader END -->
    
    <!-- sidebar -->
        @include('admin\layouts\sidebar')
    <!-- sidebar end -->

    <main class="main-content">
      <!--navbar -->
      @include('admin\layouts\navbar')
      <!-- navbar end -->

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                @yield('content') 
            </div>
        </div>
      <!-- Footer Section Start -->
        @include('admin\layouts\footer')
      <!-- Footer Section End -->    
    </main>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Library Bundle Script -->
    <script src="{{ asset('hopeUI/assets/js/core/libs.min.js') }}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{ asset('hopeUI/assets/js/core/external.min.js') }}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{ asset('hopeUI/assets/js/charts/widgetcharts.js') }}"></script>
    
    <!-- mapchart Script -->
    <script src="{{ asset('hopeUI/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('hopeUI/assets/js/charts/dashboard.js') }}" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/fslightbox.js') }}"></script>
    
    <!-- Settings Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/setting.js') }}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/slider-tabs.js') }}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{ asset('hopeUI/assets/js/plugins/form-wizard.js') }}"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="{{ asset('hopeUI/assets/vendor/aos/dist/aos.js') }}"></script>
    
    <!-- App Script -->
    <script src="{{ asset('hopeUI/assets/js/hope-ui.js') }}" defer></script>

    <script>
      $(function () {
        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
      });

      /* $(function () {
          $('#provinsi').on('change', function(){
                let id_provinsi = $('#provinsi').val();
                
                console.log(id_provinsi);
          });
      }); */
     
    </script>
  </body>
</html>