@extends('layouts.master-admin-ppdb')
@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="{{route('home')}}">{{Auth::user()->name}}</a>
            <span class="breadcrumb-item active">Edit Password Account</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-eye" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit Password Account</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
    <br>
    <div class="br-pagebody">
        <div class="d-flex align-items-center justify-content-center bg-white-300 ht-500 pd-x-20 pd-xs-x-0 mt-2">
            <form action="{{route('edit-password-store-ao')}}" method="post">
                @csrf
                <div class="card wd-350 shadow-base">
                    <div class="card-body pd-x-20 pd-xs-40">
                    <h5 class="tx-xs-24 tx-normal tx-gray-900 mg-b-15">Edit Account Login</h5>
                    <p class="mg-b-30 tx-14">Silahkan Buat Password Baru Anda</p>

                    <div class="form-group">
                        <label for="">Email<span class="tx-danger">*</span></label>
                        {{-- <input class="form-control" type="text" name="nisn" placeholder="NISN" value="{{$data->nisn}}" readonly> --}}
                        <input class="form-control" type="text" name="" placeholder="Email" value="{{Auth::user()->email}}" readonly>

                    </div><!-- form-group -->

                    <div class="form-group">
                        <label for="">Old Password <span class="tx-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="old_password" placeholder="Password Lama" id="oldpassword">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye_old_pass" onclick="toggle_old_pass()"></i></div>
                            </div>
                        </div>
                        @if ($message = Session::get('error_old_password'))
                            <strong style="color:red;">{{ $message }}</strong>
                        @endif
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label for="">New Password <span class="tx-danger">*</span></label>
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
                            <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                            </div>
                        </div>
                        @if ($message = Session::get('non_new_pass'))
                            <strong style="color:red;">{{ $message }}</strong>
                        @endif
                    </div><!-- form-group -->

                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" id="copassword">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                            </div>
                        </div>
                    </div><!-- form-group -->

                    <button type="submit" class="btn btn-info btn-block">Update</button>
                    </div><!-- card-body -->
                </div><!-- card -->
            </form>
        </div><!-- d-flex -->
    </div><!-- br-pagebody -->
@endsection

@push('password-eye')
    <script>
        var state= false;

        function toggle_old_pass() {
            if (state) {
                document.getElementById(
                    "oldpassword").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye_old_pass").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "oldpassword").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye_old_pass").style.color='#5887ef';
                state = true;
            }
        }

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


