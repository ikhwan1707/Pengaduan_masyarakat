<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Pengaduan Masyarakat</title>
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
                                <a href="">HOME</a>
                             </li>
                            <li class="active">
                                <a class="button btn-hdr" href="{{ Route('login')}}">LOGIN</a>
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
                     <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                    </svg>Laporkan!</a>
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