@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="{{route('report-bugs-admin.index')}}">Management User</a>
            <span class="breadcrumb-item active">Detail Report Bugs</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-info-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Detail Report Bugs</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="d-md-flex align-items-center mb-4">
                    <a href="{{route('report-bugs-admin.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                    </a>
                    <h3 class="card-title mb-md-0">Detail Report Bugs</h3>
                </div>
                <br>
            <div class="row justify-content-center">                
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Pelapor</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email Pelapor</th>
                            <td>{{$data->email}}</td>
                        </tr> 
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Subject</th>
                            <td>{{$data->subject}}</td>
                        </tr>
                        @if ($data->status == 'complate')
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge badge-success" style="font-size:12px;">Tuntas</span> 
                                </td>
                            </tr> 
                        @elseif($data->status == 'not complete')
                            <tr>
                                <th>Action</th>
                                <td>
                                    <a class="badge badge-success p-2 mr-1" href="{{route('report-bugs-detail.complete', $data->id)}}"><i class="far fa-check-circle mr-2"></i>Tuntas</a>
                                    <a class="badge badge-warning p-2 ml-1" href="{{route('report-bugs-detail.not-complete', $data->id)}}"><i class="far fa-clock mr-2"></i>Belum Tuntas</a>
                                    <a class="badge badge-danger p-2 ml-1" href="{{route('report-bugs-detail.spam', $data->id)}}"><i class="fa fa-trash mr-2"></i>Pesan Spam</a>

                                </td>
                            </tr> 
                        @elseif($data->status == 'spam')
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge badge-danger" style="font-size:12px;">Spam</span> 
                                </td>
                            </tr> 
                        @endif
                    </table>
                </div>
            </div>

            <br>

            <div class="row justify-content-center  bg-white shadow-sm p-3" style="color: #000;">   
                <div class="col-lg-12">
                    <div class="blog_details text-justify" >
                        <h5 class="text-center">ISI LAPORAN</h5>
                        <hr>
                        <p class="">{!!$data->text_report!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection