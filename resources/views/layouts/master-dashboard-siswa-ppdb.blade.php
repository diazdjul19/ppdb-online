

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

        {{-- <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script> --}}

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script> --}}



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>PPDB Online</title>
    <link rel="icon" href="/safario/img/favicon.png" type="image/png">


    <!-- vendor css -->
    <link href="/bracket-master/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="/bracket-master/app/css/bracket.css">
    {{-- favicon --}}
    <link rel="shortcut icon" href="/bracket-master/app/img/favicon-32x32.png" />
</head>

<body>

    
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>PPDB <i>Online</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{route('home-db-siswa')}}" class="br-menu-link {{ request()->is('home-db-siswa') ? 'active' : 'home-db-siswa' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('datadiri-db-siswa','data-db-orangtua-wali') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Update Data</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                <li class="sub-item"><a href="{{route('datadiri-db-siswa')}}" class="sub-link {{ request()->is('datadiri-db-siswa') ? 'active' : '' }}">Update Data Diri</a></li>
                <li class="sub-item"><a href="{{route('data-db-orangtua-wali')}}" class="sub-link {{ request()->is('data-db-orangtua-wali') ? 'active' : '' }}">Udate Data Orangtua / wali</a></li>
                {{-- <li class="sub-item"><a href="" class="sub-link {{ request()->is('') ? 'active' : '' }}"></a></li> --}}
            </ul>
        </li><!-- br-menu-item -->

        @if ($data->id_table_ms_prospective_grades == true)
            
        @else
            <li class="br-menu-item">
                <a href="{{route('upload-data-nilai')}}" class="br-menu-link {{ request()->is('upload-data-nilai') ? 'active' : 'upload-data-nilai' }}">
                <i class="menu-item-icon icon ion-share tx-24"></i>
                <span class="menu-item-label">Upload Data Nilai</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
        @endif
        

        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
        <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
            <input id="searchbox" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div><!-- input-group -->
        </div><!-- br-header-left -->

        {{-- Profile --}}
        <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name hidden-md-down">{{$data->nama_calon_siswa}}</span>
                <img src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}" class="wd-32 rounded-circle" alt="">
                <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
                <div class="tx-center">
                <a href=""><img src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">{{$data->nama_calon_siswa}}</h6>
                <p>{{$data->nisn}}</p>
                </div>
                <hr>
                <div class="tx-center">
                    <label class="sidebar-label pd-x-25 mg-t-25" style="color:black">Time &amp; Date</label>
                    <div class="pd-x-25">
                        <h4 id="brTime" class="br-time" style="color:#000;"></h4>
                        <h6 id="brDate" class="br-date" style="color:#000;"></h6>
                    </div>
                </div>
                <hr>
                <ul class="list-unstyled user-profile-nav">
                    {{-- LOGOUT BAWAAN LARAVEL  --}}
                    {{-- <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                    <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li> --}}
                    {{-- <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="icon ion-power"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </li> --}}
                    <li><a href="{{route('edit-password', $data->enter_code)}}"><i class="icon ion-wrench"></i> Edit Password</a></li>
                    
                    <li>
                        <a class="dropdown-item" href="{{ route('logout-db-siswa') }}">
                            <span><i class="icon ion-power"></i>Logout</span>
                        </a>
                        
                    </li>
                </ul>
                </ul>
            </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        </div><!-- br-header-right -->


    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- ########## END: RIGHT PANEL ########## --->




    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        @yield('br-mainpanel')

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2020. Diaz Djuliansyah.</div>
                <div>Teknik Komputer Jaringan. SMKN 4 Kota Bekasi</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Check:</span>
                <a target="_blank" class="pd-x-5" href=""><i class="fab fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href=""><i class="fab fa-instagram tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <script src="/bracket-master/app/lib/jquery/jquery.min.js"></script>
    <script src="/bracket-master/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="/bracket-master/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/bracket-master/app/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/bracket-master/app/lib/moment/min/moment.min.js"></script>
    <script src="/bracket-master/app/lib/peity/jquery.peity.min.js"></script>
    <script src="/bracket-master/app/lib/highlightjs/highlight.pack.min.js"></script>
    <script src="/bracket-master/app/lib/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/bracket-master/app/lib/parsleyjs/parsley.min.js"></script>

    <script src="/bracket-master/app/js/bracket.js"></script>

    @stack('script-1')
    @stack('password-eye')
</body>
</html>
