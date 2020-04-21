@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Web</a>
            
            @if (request()->is('maweb-pendaftaran-create'))
                <a class="breadcrumb-item" href="{{route('maweb-pendaftaran')}}">MaWeb Pendaftaran</a>
            @elseif(request()->is('maweb-hasil-seleksi-create'))
                <a class="breadcrumb-item" href="{{route('maweb-hasil-seleksi')}}">MaWeb Hasil Seleksi</a>
            @elseif(request()->is('maweb-contact-us-create'))
                <a class="breadcrumb-item" href="{{route('maweb-contact-us')}}">MaWeb Contact Us</a>
            @endif
            
            <span class="breadcrumb-item active">
                @if (request()->is('maweb-pendaftaran-create'))
                    Create MaWeb Pendaftaran
                @elseif(request()->is('maweb-hasil-seleksi-create'))
                    Create MaWeb Hasil Seleksi
                @elseif(request()->is('maweb-contact-us-create'))
                    Create MaWeb Contact Us
                @endif
            </span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-calendar" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>
                @if (request()->is('maweb-pendaftaran-create'))
                    Create MaWeb Pendaftaran
                @elseif(request()->is('maweb-hasil-seleksi-create'))
                    Create MaWeb Hasil Seleksi
                @elseif(request()->is('maweb-contact-us-create'))
                    Create MaWeb Contact Us
                @endif
            </h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>




    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">
                        <div class="d-md-flex align-items-center mb-4">
                            {{-- <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                            </a> --}}

                            @if (request()->is('maweb-pendaftaran-create'))
                                <h4 class="card-title mb-md-0">Form Create MaWeb Pendaftaran</h4>
                            @elseif(request()->is('maweb-hasil-seleksi-create'))
                                <h4 class="card-title mb-md-0">Form Create MaWeb Hasil Seleksi</h4>
                            @elseif(request()->is('maweb-contact-us-create'))
                                <h4 class="card-title mb-md-0">Form Create MaWeb Contact Us</h4>
                            @endif
                        </div>
                        <br>                

                        @if (request()->is('maweb-pendaftaran-create'))
                            <form class="form-sample" action="{{route('maweb-pendaftaran-store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis MaWeb</label>
                                    <input type="text" name="jenis_maweb" class="form-control" id="exampleInputEmail1"  placeholder="" value="MaWeb Pendaftaran" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Dari Tanggal</label>                                    
                                                <input id="picker-1" type="text" class="form-control" name="dari_tgl" required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Sampai Tanggal </label>
                                                <input id="picker-2" type="text" class="form-control" name="sampai_tgl" required  >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Simpan</span>
                                    </div>
                                </button>
                            </form>
                        @elseif(request()->is('maweb-hasil-seleksi-create'))
                            <form class="form-sample" action="{{route('maweb-hasil-seleksi-store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis MaWeb</label>
                                    <input type="text" name="jenis_maweb" class="form-control" id="exampleInputEmail1"  placeholder="" value="MaWeb Hasil Seleksi" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Dari Tanggal</label>                                    
                                                <input id="picker-1" type="text" class="form-control" name="dari_tgl" required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Sampai Tanggal </label>
                                                <input id="picker-2" type="text" class="form-control" name="sampai_tgl" required  >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Simpan</span>
                                    </div>
                                </button>
                            </form>
                        @elseif(request()->is('maweb-contact-us-create'))
                            <form class="form-sample" action="{{route('maweb-contact-us-store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis MaWeb</label>
                                    <input type="text" name="jenis_maweb" class="form-control" id="exampleInputEmail1"  placeholder="" value="MaWeb Contact Us" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Dari Tanggal</label>                                    
                                                <input id="picker-1" type="text" class="form-control" name="dari_tgl" required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Sampai Tanggal </label>
                                                <input id="picker-2" type="text" class="form-control" name="sampai_tgl" required  >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Simpan</span>
                                    </div>
                                </button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@push('datetime-picker')
    <script>
        jQuery.datetimepicker.setLocale('id')
        jQuery(document).ready(function () {
            'use strict';
            jQuery('#picker-1, #picker-2').datetimepicker({
                timepicker: true,
                datepicker: true,
                format: 'Y/m/d H:i',
                mask: true,
                lang: 'id',
                i18n:{
                    month: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    dayOfWeek: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
                }
                
            });
        });
    </script>
@endpush