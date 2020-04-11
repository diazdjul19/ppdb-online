@extends('layouts.master-admin-ppdb')
@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <a class="breadcrumb-item" href="{{route('siswa-process')}}">Management Siswa Process</a>
            <span class="breadcrumb-item active">Create Siswa</span>
            <span class="breadcrumb-item active">Create Password Account</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-eye" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Create Password Account</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="d-flex align-items-center justify-content-center bg-white-300 ht-500 pd-x-20 pd-xs-x-0 mt-2">
            <form action="{{route('siswa-process-laman-store')}}" method="post">
                @csrf
                <div class="card wd-350 shadow-base">
                    <div class="card-body pd-x-20 pd-xs-40">
                    <h5 class="tx-xs-24 tx-normal tx-gray-900 mg-b-15">Registrasi Account Login</h5>
                    <p class="mg-b-30 tx-14">Silahkan Buat Password Anda</p>


                    <div class="form-group">
                        <label for="">NISN <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nisn" placeholder="NISN" value="{{$data->nisn}}" readonly>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label for="">Password <span class="tx-danger">*</span></label>
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-close alert-icon tx-30 tx-danger mg-r-20"></i>
                                    <span><strong>{{ $message }}</strong></span>
                                </div><!-- d-flex -->
                            </div><!-- alert -->
                        @endif
                        <div class="input-group">
                            <input class="form-control" type="password" name="password_pendaftaran" placeholder="Password" id="password">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                            </div>
                        </div>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" id="copassword">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                            </div>
                        </div>
                    </div><!-- form-group -->

                    <button type="submit" class="btn btn-info btn-block">Register</button>
                    </div><!-- card-body -->
                </div><!-- card -->
            </form>
        </div><!-- d-flex -->
    </div><!-- br-pagebody -->
@endsection

@push('password-eye')
    <script>
        var state= false;
        function toggle1() {
            if (state) {
                document.getElementById(
                    "password").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye1").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye1").style.color='#5887ef';
                state = true;
            }
        }

        function toggle2() {
            if (state) {
                document.getElementById(
                    "copassword").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye2").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "copassword").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye2").style.color='#5887ef';
                state = true;
            }
        }
    </script>
@endpush


