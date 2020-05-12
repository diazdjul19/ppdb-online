@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="">Management Content</a>
            <span class="breadcrumb-item active">MaCont Profil Sekolah</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-clipboard" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>MaCont Profil Sekolah</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>


    @if($data_code == null)
        {{-- br-body --}}
        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-12 grid-margin">
                            <div class="d-md-flex align-items-center mb-4">
                                <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                                <h4 class="card-title mb-md-0">MaCont Profil Sekolah</h4>
                            </div>              
                            <form class="form-sample" action="{{route('macont-profil-sekolah-store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="nama_content" class="form-control" id="exampleInputEmail1" autocomplete="off"  readonly value="Profil Sekolah" required >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">MD5 Unik Code </label>
                                    <input type="text" name="code_unik" class="form-control" id="exampleInputEmail1" autocomplete="off"  readonly value="c9c9aa4b06eb1592459070c357743a63" required >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ISI CONTENT</label>
                                    <textarea id="note1" name="text_information"></textarea>
                                    <span><i>Max Ideal Width Image 700px.</i></span>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-6">
                                        <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100  px-4 font-14">Publish<i class="fa fa-save ml-2"></i></button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- br-body --}}

    @elseif($data_code != null)
        {{-- br-body --}}
        <div class="br-pagebody">

            @if ($message = Session::get('success_create'))
                <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-success">Success Create Data Agenda</h5>
                        <p class="mg-b-0 tx-gray">{{$message}}</p>
                    </div>
                    </div><!-- d-flex -->
                </div><!-- alert -->
            @endif

            @if ($message = Session::get('success_update'))
                <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-success">Success Update Data Agenda</h5>
                        <p class="mg-b-0 tx-gray">{{$message}}</p>
                    </div>
                    </div><!-- d-flex -->
                </div><!-- alert -->
            @endif
            
            <div class="br-section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-12 grid-margin">
                            <div class="d-md-flex align-items-center mb-4">
                                <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                                <h4 class="card-title mb-md-0">MaCont Profil Sekolah</h4>
                            </div>              
                            <form class="form-sample" action="{{route('macont-profil-sekolah-update', $data_code->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="nama_content" class="form-control" id="exampleInputEmail1" autocomplete="off"  readonly value="{{$data_code->nama_content}}" required >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">MD5 Unik Code </label>
                                    <input type="text" name="code_unik" class="form-control" id="exampleInputEmail1" autocomplete="off"  readonly value="{{$data_code->code_unik}}" required >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ISI CONTENT</label>
                                    <textarea id="note1" name="text_information">{{$data_code->text_information}}</textarea>
                                    <span><i>Max Ideal Width Image 700px.</i></span>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-6">
                                        <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100  px-4 font-14">Publish<i class="fa fa-save ml-2"></i></button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- br-body --}}
    @endif
    
@endsection


@push('summernote')
    <script>
        $(function(){
            'use strict';

            // Summernote editor
            $('#note1').summernote({
            height: 150,
            tooltip: false
            })
        });
    </script>
@endpush

