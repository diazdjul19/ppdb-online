<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPDB Online SMKN 4 Bekasi</title>
        <link rel="icon" href="/safario/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="/safario/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/safario/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/safario/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/safario/vendors/linericon/style.css">
    <link rel="stylesheet" href="/safario/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/safario/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/safario/vendors/flat-icon/font/flaticon.css">
    <link rel="stylesheet" href="/safario/vendors/nice-select/nice-select.css">

    <link rel="stylesheet" href="/safario/css/style.css">

    <!-- vendor css -->
    <link href="/bracket-master/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="/bracket-master/app/css/bracket.css">
    
	<link href="/bracket-master/app/lib/highlightjs/styles/github.css" rel="stylesheet">

    {{-- Datatable --}}
    <link href="/bracket-master/app/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    {{-- Summernote --}}
    <link href="/bracket-master/app/lib/summernote/summernote-bs4.css" rel="stylesheet">
    
    </head>
    <body class="bg-shape">

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
            <a class="navbar-brand logo_h mt-2 mb-2" href="index.html"><img src="/safario/img/SMKN4.png" width="75px" height="75px" alt=""></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav justify-content-end">
                    <li class="nav-item {{ request()->is('home-web') ? 'active' : '' }}"><a class="nav-link" href="{{route('home-web')}}">Home</a></li> 
                    <li class="nav-item {{ request()->is('create-pendaftaran') ? 'active' : '' }}"><a class="nav-link" href="{{route('create-pendaftaran')}}">Pendaftaran</a></li> 
                    <li class="nav-item {{ request()->is('hasil-seleksi') ? 'active' : '' }}"><a class="nav-link" href="{{route('hasil-seleksi')}}">Hasil Seleksi</a></li> 
    

                    <li class="nav-item submenu dropdown {{ request()->is('contact-us', 'read-prosedur-syarat', 'read-agenda', 'read-daftar-ulang', 'read-profil-sekolah') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Tentang Sekolah</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('read-profil-sekolah')}}">Profil Sekolah</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('read-prosedur-syarat')}}">Prosedur & Syarat</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('read-agenda')}}">Agenda</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('read-daftar-ulang')}}">Info Daftar Ulang</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('contact-us')}}">Kontak Admin</a></li>
                            <li class="nav-item">
                        </ul>
                    </li>

                    <li class="nav-item submenu dropdown {{ request()->is('report-bugs') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Report Bugs</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('report-bugs')}}">Report Bugs</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Admin & Operator</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item {{ request()->is('contact-us') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact-us')}}">Contact</a></li>                  --}}
                </ul>

                {{-- Start Login Siswa --}}
                <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                    <div class="dropdown stay-open">
                        <a href="#" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                            <div class=" button ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                            <span class="mg-r-10 tx-13 tx-medium">Login Siswa</span><i class="fa fa-angle-down mg-l-5"></i>
                            </div>
                        </a>
                        
                        <form action="{{route('laman-login-cs')}}" method="post">
                            @csrf
                            <div class="dropdown-menu bg-white pd-40 wd-300">
                                <h6 class="tx-gray-800 tx-uppercase tx-bold">Silahkan Login</h6>
                                <p class="tx-gray-600 mg-b-30">Menggunakan NISN dan Password yang telah anda buat.</p>

                                @if ($message = Session::get('gagal_login1'))
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="d-flex align-items-center justify-content-start">
                                        {{-- <i class="icon ion-alert-circled alert-icon tx-32 mg-t-5 mg-xs-t-0"></i> --}}
                                        <span><strong>NISN / Password Tidak Cocok! &#128553;</strong></span>
                                        </div><!-- d-flex -->
                                    </div>
                                @endif

                                @if ($message = Session::get('gagal_login2'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                            {{-- <i class="icon ion-ios-close alert-icon tx-32"></i> --}}
                                            <span><strong>Anda Belum Daftar ya? &#128580; </strong></span>
                                            </div><!-- d-flex -->
                                        </div>
                                @endif

                                

                                <div class="form-group">
                                <input type="text" class="form-control pd-y-12" name="nisn" placeholder="NISN">
                                </div><!-- form-group -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="password_pendaftaran" placeholder="Password" id="password_login">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye_login" onclick="toggle_login()"></i></div>
                                        </div>
                                    </div>
                                </div><!-- form-group -->
                                <div class="form-group"><a href="" class="tx-12">Forgot password?</a></div>
                                <button type="submit" class="btn btn-primary btn-block pd-y-10 mg-b-30">Sign In</button>

                            </div><!-- dropdown-menu -->
                        </form>
                    </div><!-- dropdown -->
                </div>
                {{-- Finish Login Siswa --}}
            </div> 
            </div>
        </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    

    {{-- Content --}}

    @yield('content-web');


    {{-- Content --}}


    <!-- ================ start footer Area ================= -->
    <footer class="footer" style="background-color:#04091E;">
        <div class="container">
            <div class="footer-bottom">
                <div class="row align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->
    <script src="/safario/vendors/jquery/jquery-3.4.1.min.js"></script>
    <script src="/safario/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/safario/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/safario/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="/safario/js/jquery.ajaxchimp.min.js"></script>
    <script src="/safario/js/mail-script.js"></script>
    <script src="/safario/js/skrollr.min.js"></script>
    <script src="/safario/js/main.js"></script> 
    @include('sweetalert::alert')



    {{-- Datatable --}}
    <script src="/bracket-master/app/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

    {{-- Summernote --}}
    <script src="/bracket-master/app/lib/summernote/summernote-bs4.min.js"></script>

    {{-- <script src="/bracket-master/app/lib/jquery/jquery.min.js"></script> --}}
    <script src="/bracket-master/app/lib/highlightjs/highlight.pack.min.js"></script>
    <script src="/bracket-master/app/lib/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/bracket-master/app/lib/parsleyjs/parsley.min.js"></script>
    
    @stack('script-1')
    @stack('footer-web')
    @stack('summernote')

    {{-- @stack('tawk_to') --}}


    <script>
        var state= false;
        function toggle_login() {
            if (state) {
                document.getElementById(
                    "password_login").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye_login").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password_login").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye_login").style.color='#5887ef';
                state = true;
            }
        }
    </script>
    </body>
</html>


<!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e97a92b69e9320caac40557/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->