<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{ config('app.name', 'Pengaduan Masyarakat') }}</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('Bizbag/html/images/favicon.ico') }}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('Bizbag/html/css/bootstrap.min.css') }}">      
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('Bizbag/html/css/animate.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('Bizbag/html/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('Bizbag/html/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('Bizbag/html/css/responsive.css') }}">
   </head>
   <body>
      <!-- loading -->
      <div id="loading">
         <div id="loading-center">
            <img src="{{ asset('Bizbag/html/images/loader.gif') }}" alt="loader">
         </div>
      </div>
      <!-- loading End -->
      <!-- Header Start -->
      <header id="main-header" class="header-one">
   <!-- menu start -->
   <nav id="menu-1" class="mega-menu" data-color="">
      <!-- menu list items container -->
        <div class="menu-list-items">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li>
                                <a href="/"><img src="{{ asset('Bizbag/html/images/logo.png') }}" alt="logo" class="img-fluid"></a>
                            </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <li class="active">
                                <a href="">Home</a>
                             </li>
                             <li class="">
                              <a href="">Pengaduan</a>
                           </li>
                            <li class="active">
                                <a class="button btn-hdr" href="{{ Route('signOut')}}">LogOut</a>
                            </li>
                        </ul>
                    </div>
                 </div>
            </div>
        </div>
    </nav>
<!-- menu end -->
</header>
<!-- Header End -->
      <!-- Slider Banner Start -->
      <div class="container">
      <div class="iq-banner">
         <div class="row slider-row justify-content-between">
            <div class="col-lg-6 align-self-center">
               <div class="slider-banner">
                  <h2 class="text-uppercase mb-3">Layanan Pengaduan<br>Masyarakat Online</h2>
                  <p class="pr-lg-4 mb-4">Sampaikan laporan masalah anda di sini, kami akan memprosesnya dengan cepat.</p>
                  <a href="#" class="btn slide-button button">
                     Laporkan!</a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="slider-image-1 slide-1">
                  <!-- <div class="slider-1"></div> -->
                  <div class="slider-2"></div>
                  <div class="slider-3"></div>
                  <div class="slider-4"></div>
                  <img class="banner-img img-fluid center-block wow bounce" src="{{ asset('Bizbag/html/images/slider/banner-1/1.svg') }}" alt="">
               </div>
            </div>
          </div>
      </div>
      </div>
      <!-- Slider Banner End -->
      <!-- Main-Content Start -->
    </div>
      <!-- back-to-top End -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('Bizbag/html/js/jquery-1.11.1.min.js') }}" ></script>
      <!-- popper  -->
      <script src="{{ asset('Bizbag/html/js/popper.min.js') }}"></script>
      <!--  bootstrap -->
      <script src="{{ asset('Bizbag/html/js/bootstrap.min.js') }}" ></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('Bizbag/html/js/appear.js') }}"></script>
      <!-- Mega menu JavaScript -->
      <script src="{{ asset('Bizbag/html/js/mega_menu.min.js') }}"></script>
      <!-- Count Down JavaScript -->
      <script src="{{ asset('Bizbag/html/js/countdown.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('Bizbag/html/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('Bizbag/html/js/jquery.magnific-popup.min.js') }}"></script>
      <!--  Counter -->
      <script src="{{ asset('Bizbag/html/js/jquery.countTo.js') }}" ></script>
      <!-- Skrollr JavaScript -->
      <script src="{{ asset('Bizbag/html/js/skrollr.js') }}"></script>
      <!-- Isotope JavaScript -->
      <script src="{{ asset('Bizbag/html/js/isotope.pkgd.min.js') }}"></script>
      
      <!-- Wow JavaScript -->
      <script src="{{ asset('Bizbag/html/js/wow.min.js') }}"></script>

      <!--  Custom -->
      <script src="{{ asset('Bizbag/html/js/custom.js') }}" ></script>
   </body>
</html>