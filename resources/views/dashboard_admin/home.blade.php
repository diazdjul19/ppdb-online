@extends('layouts.master-admin-ppdb')
@section('br-mainpanel')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Dashboard</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">

        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
            <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-users tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Jumlah Pendaftar</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">500 siswa</p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch1" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-user-times tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Tidak Lulus</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">10 siswa</p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-success rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-user-check tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Peserta Lulus</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">300 siswa</p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-clock tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Belum Di Proses</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">100 siswa</p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
        </div><!-- row -->

        <br>

        <div class="row row-sm">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header tx-medium bd-0 tx-white bg-mantle">
                        Profile Admin PPDB
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle " style="width:130px;height:135px;" src="{{url('/storage/user/'.Auth::user()->foto_user)}}" alt="">
                        </div>

                        <div class="rounded-bottom mt-3">
                            <ul class="list-group">
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Nama User</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{Auth::user()->name}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Email</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{Auth::user()->email}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Level</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">
                                                @if (Auth::user()->level == 'A')
                                                    <span class="badge badge-primary" style="font-size:12px;">Admin</span> 
                                                @elseif(Auth::user()->level == 'O')
                                                    <span class="badge badge-info" style="font-size:12px;">Operator</span> 
                                                @endif    
                                        </span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Tanggal Register</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{date('d M Y', strtotime(Auth::user()->created_at))}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <!-- add more here -->
                            </ul>
                        </div><!-- card-body -->
                    </div>
                    
                </div><!-- card -->
            </div>

            <div class="col-sm-8">
                <div class="card bd-0 shadow-base pd-25">
                    
                </div><!-- card -->
            </div>
        </div><!-- row -->

    </div><!-- br-pagebody -->
@endsection
