{{-- @extends('admin.layouts.app')
@section('content') --}}
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
                            @if (Auth::user()->level == 'masyarakat')
                            <ul class="menu-links">
                                <li class="">
                                    <a href="/">Home</a>
                                </li>
                                <li class="active">
                                    <a href="{{ Route('masyarakat_pengaduan.create')}}">Laporkan Pengaduan</a>
                                </li>
                                <li class="">
                                    <a href="{{ Route('masyarakat_pengaduan.history')}}">Catatan Pengaduan</a>
                                </li>
                                <li class="">
                                    <a href="{{ Route('signOut')}}">LogOut</a>
                                </li>
                                <li>
                                    {{-- <a href="{{ Route('signOut')}}">LogOut</a> --}}
                                </li>
                            </ul>
                            @elseif (Auth::user()->level == 'petugas' || Auth::user()->level == 'admin')
                            <ul class="menu-links">
                                <li class="active">
                                    <a href="dashboard">Home</a>
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
    <!-- Slider Banner Start -->
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
                                                    <input type="file" class="form-control" id="select-image"
                                                        name="foto[]" multiple />
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
    {{-- @endsection --}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(document).on('ready',()=>{
                $("#select-image").on('change',function(){

                    $(".filearray").empty();//you can remove this code if you want previous user input
                    for(let i=0;i<this.files.length;++i){
                        let filereader = new FileReader();
                        let $img=jQuery.parseHTML("<img src='' height='100px' widht='50px'> ");
                        filereader.onload = function(){
                            $img[0].src=this.result;
                        };
                        filereader.readAsDataURL(this.files[i]);
                        $(".filearray").append($img);
                    }


                });
            });
    </script>
</body>

</html>