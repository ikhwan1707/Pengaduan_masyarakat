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
   {{-- <div id="loading">
      <div id="loading-center">
         <img src="{{ asset('Bizbag/html/images/loader.gif') }}" alt="loader">
      </div>
   </div> --}}
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
                           <a href="/"><img src="{{ asset('Bizbag/html/images/logo.png') }}" alt="logo"
                                 class="img-fluid"></a>
                        </li>
                     </ul>
                     <!-- menu links -->

                     @if (Auth::user())
                     <ul class="menu-links">
                        <li class="">
                           <a href="/">Home</a>
                        </li>
                        <li class="">
                           <a href="{{ Route('masyarakat_pengaduan.create')}}">Laporkan Pengaduan</a>
                       </li>
                        <li class="active">
                           <a href="{{ Route('masyarakat_pengaduan.history')}}">Catatan Pengaduan</a>
                        </li>
                        <li class="">
                           <a href="{{ Route('signOut')}}">LogOut</a>
                        </li>
                        <li>
                           {{-- <a href="{{ Route('signOut')}}">LogOut</a> --}}
                        </li>
                     </ul>
                     @else
                     <ul class="menu-links">

                        <li class="active">
                           <a href="{{ route('login')}}">Login</a>
                        </li>
                        <li>

                        </li>
                     </ul>
                     @endif

                  </div>
               </div>
            </div>
         </div>
      </nav>
      <!-- menu end -->
   </header>
   <!-- Header End -->
   <!-- Main-Content Start -->
   <div class="main-content">
      <!-- Portfolio-start  -->
      <section id="our-blog" class="blog gray-bg">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="title-box text-center">
                     <span class="text-warning">Pengaduan Masyarakat</span>
                     <h2 class="title">Catatan Pengaduan Masyarakat</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="iq-masonry-block">
                     <div class="isotope-filters isotope-tooltip">
                        <button data-filter="" class="active">Semua</button>
                        <button data-filter=".0">Terkirim</button>
                        <button data-filter=".proses">Proses</button>
                        <button data-filter=".selesai">Selesai</button>
                     </div>

                     <div class="iq-masonry iq-columns-3">
                        @foreach ($data_pengaduan as $pengaduan)
                        <div class="iq-masonry-item {{$pengaduan->status}}">
                           <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false"
                              data-dots="false" data-items="1" data-items-laptop="1" data-items-tab="1"
                              data-items-mobile="1" data-items-mobile-sm="1" data-margin="10">
                              @php
                              $foto = App\Models\Pengaduan_image::where('pengaduan_unique_id',
                              $pengaduan->unique_id)->get();
                              @endphp
                              @foreach($foto as $item)
                              <div class="item">
                                 <div class="iq-blog-box">
                                    <div class="iq-blog-image clearfix">
                                       <img src="{{ asset('images/'.$pengaduan->foto) }}/{{$item->foto}}"
                                          class="img-fluid center-block" alt="blogimage0">
                                       <ul class="iq-blogtag">
                                          <li>
                                             @if($pengaduan->status == '0')
                                             <a>Terkirim</a>
                                             @elseif ($pengaduan->status == 'proses')
                                             <a>Proses</a>
                                             @else
                                             <a>Selesai</a>
                                             @endif
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="iq-blog-detail">
                                       <div class="iq-blog-meta">
                                          <ul>
                                             <li class="list-inline-item">
                                                <p class="main-color">{{ $pengaduan->tgl_pengaduan }}</p>
                                             </li>
                                          </ul>
                                       </div>

                                       <p>{{$pengaduan->isi_laporan}}</p>
                                       <a class="btn-link" href="#">Lihat Tanggapan<i class="fa fa-angle-right"
                                             aria-hidden="true"></i></a>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                        @endforeach
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Portfolio End  -->
      <!-- Main-Content Start -->
   </div>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- back-to-top End -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="{{ asset('Bizbag/html/js/jquery-1.11.1.min.js') }}"></script>
   <!-- popper  -->
   <script src="{{ asset('Bizbag/html/js/popper.min.js') }}"></script>
   <!--  bootstrap -->
   <script src="{{ asset('Bizbag/html/js/bootstrap.min.js') }}"></script>
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
   <script src="{{ asset('Bizbag/html/js/jquery.countTo.js') }}"></script>
   <!-- Skrollr JavaScript -->
   <script src="{{ asset('Bizbag/html/js/skrollr.js') }}"></script>
   <!-- Isotope JavaScript -->
   <script src="{{ asset('Bizbag/html/js/isotope.pkgd.min.js') }}"></script>

   <!-- Wow JavaScript -->
   <script src="{{ asset('Bizbag/html/js/wow.min.js') }}"></script>

   <!--  Custom -->
   <script src="{{ asset('Bizbag/html/js/custom.js') }}"></script>

   <!-- Retina JavaScript -->
   <script src="{{ asset('Bizbag/html/js/retina.min.js') }}"></script>

   <script>
      $("#swal-6").click(function() {
            console.log("ok");
       swal({
           title: 'Harus login dulu',
           text: 'Untuk mengisi pengaduan anda harus login terlebih dahulu',
           icon: 'warning',
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             window.location.href = "/login";
           } else {
           swal('Oke!');
           }
         });
     });
   </script>
</body>

</html>