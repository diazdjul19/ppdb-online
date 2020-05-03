@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="{{route('gelpend.index')}}">Gelombang Pendaftaran</a>
            <span class="breadcrumb-item active">Edit Gelpend</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit Gelpend</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">
                        <div class="d-md-flex align-items-center mb-4">
                            <a href="{{route('user.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                            </a>
                            <h4 class="card-title mb-md-0">Edit Gelombang Pendaftaran</h4>
                        </div>              
                        <form class="form-sample" action="{{route('gelpend.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}     
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Gelpend</label>
                                <input type="text" name="nama_gelombang" class="form-control" id="exampleInputEmail1" autocomplete="off"  readonly value="{{$data->nama_gelombang}}" required >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea id="note1" name="text_description">{{$data->text_description}}</textarea>
                                
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-6">
                                    <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100  px-4 font-14">Update<i class="fa fa-save ml-2"></i></button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
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

