@extends('layouts.master-web-ppdb')

@section('content-web')

    


    <!--================Hero Banner Area Start =================-->
    <section class="hero-banner magic-ball">
        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-success">{{$message}}</h5>
                        <p class="mg-b-0 tx-gray">Silahkan login menggunakan NISN dan Password yang telah anda buat.</p>
                    </div>
                    </div><!-- d-flex -->
                </div><!-- alert -->
            @endif
        
        <div class="row align-items-center text-center text-md-left">
            <div class="col-md-7 col-lg-5 mb-5 mb-md-0">
                <h1>SMKN 4 Kota Bekasi</h1>
                <p>Sistem Pendaftaran PPDB Online Berbasis Web. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <a class="button button-hero mt-4" href="#">Get Started</a>
            </div>
            <div class="col-md-5 col-lg-7 col-xl-6 offset-xl-1">
                @if ($message = Session::get('gagal_login1'))
                    <div class="alert alert-warning alert-bordered pd-y-20" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="icon ion-alert-circled alert-icon tx-52 tx-warning mg-r-20"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-warning">Gagal Login !</h5>
                            <p class="mg-b-0 tx-gray">{{$message}}</p>
                        </div>
                        </div><!-- d-flex -->
                    </div><!-- alert -->
                @endif

                @if ($message = Session::get('gagal_login2'))
                    <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-danger">Gagal Login !</h5>
                            <p class="mg-b-0 tx-gray">{{$message}}</p>
                        </div>
                        </div><!-- d-flex -->
                    </div><!-- alert -->
                @endif

                @if ($message = Session::get('pass_true'))
                    <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-danger">Error: Cannot process your entry!</h5>
                            <p class="mg-b-0 tx-gray">{{$message}}</p>
                        </div>
                        </div><!-- d-flex -->
                    </div><!-- alert -->
                @endif

                <img class="img-fluid" src="/safario/img/home/ppdb-online-hero.png" alt="">
            </div>
        </div>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->


        <!--================Service Area Start =================-->
    <section class="section-margin generic-margin">
        <div class="container">
        <div class="section-intro text-center pb-90px">
            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
            <h2>Selamat Datang di Layanan PPDB Online</h2>
            <p>Layanan SIAP PPDB Online adalah sebuah sistem layanan yang dirancang untuk melakukan otomasi seleksi Pendaftaran Peserta Didik Baru (PPDB), mulai dari proses pendaftaran, proses seleksi hingga pengumuman hasil seleksi, yang dilakukan secara online dan berbasis waktu nyata (realtime).</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card text-center">
                <div class="service-card-img">
                <img class="img-fluid" src="/safario/img/home/service1.png" alt="">
                </div>

                <div class="service-card-body">
                <h3>Isi Formulir</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card text-center">
                <div class="service-card-img">
                <img class="img-fluid" src="/safario/img/home/service2.png" alt="">
                </div>
                <div class="service-card-body">
                <h3>Proses Seleksi</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card text-center">
                <div class="service-card-img">
                <img class="img-fluid" src="/safario/img/home/service3.png" alt="">
                </div>
                <div class="service-card-body">
                <h3>Daftar Ulang</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--================Service Area End =================-->
@endsection
@include('sweetalert::alert')




