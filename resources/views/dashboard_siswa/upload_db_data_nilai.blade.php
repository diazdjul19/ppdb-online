@extends('layouts.master-dashboard-siswa-ppdb')
@section('br-mainpanel')
    <!--================Service Area Start =================-->

{{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home-db-siswa')}}">PPDB Online</a>
            <span class="breadcrumb-item active">Upload Data Nilai</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-share" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Upload Data Nilai</h4>
            <p class="mg-b-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    

    {{-- br-body --}}
    <div class="br-pagebody">
        {{-- Alert --}}
        <div class="alert alert-warning alert-bordered pd-y-20" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-sm-flex align-items-center justify-content-start">
                {{-- <i class="icon ion-alert-circled alert-icon tx-52 tx-warning mg-r-20"></i> --}}
                <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-warning">Hallo {{$data->nama_calon_siswa}}, Selamat Datang Di Form Upload Data Nilai</h5><br>
                <p class="mg-b-0 tx-gray">
                    PERINGATAN, Upload data nilai hanya bersifat sekali pakai. <br>
                    Jadi jika anda sudah pernah menekan tombol simpan pada form data nilai maka anda tidak akan bisa mengakses halaman ini kembali. <br>
                    Maka dari itu tolong isikan data nilai dengan data yang benar dan foto skhun yang sebenar benar-nya. <br><br>

                    <li>Jika surat skhun dan data nilai yang anda inputkan tidak cocok kemungkianan anda tidak akan di terima / tidak lulus.</li> <br>
                    <li>Upload data nilai berlaku sampai batas yang telah di tentukan oleh operator ppdb.</li> <br>
                    <li>Jika anda mengalami masalah dalam mengupload data nilai mohon hubungi operator ppdb.</li>

                </p>
                </div>
            </div><!-- d-flex -->
        </div><!-- alert -->


        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                <div class="col-12 grid-margin ">
                    <div class="d-md-flex align-items-center mb-4">
                        <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                        </a>
                        <h3 class="card-title mb-md-0">Form Upload Data NIlai</h3>
                    </div>

                    <br>                          
                    
                    <form action="{{route('upload-data-nilai-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <h5 class="h5 m-0 mb-2 p-0">Data Asal Sekolah</h5>
                        <div class="form-group">
                            {{-- ID Calon Siswa --}}
                            <input type="hidden" name="id_table_ms_prospective_students" required readonly value="{{$data->id}}">
                            {{-- ID Calon Siswa --}}
                            <input type="text" name="asal_sekolah_nama" class="form-control" id="exampleInputEmail1"  placeholder="Nama Sekolah" required>
                        </div>

                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col">
                                    <label>Kota Sekolah Asal</label>
                                    <div id="the-basics">
                                        <input class="typeahead form-control" type="text" name="asal_sekolah_kota" placeholder="Kota / Kabupaten" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Provinsi Sekolah Asal</label>
                                    <div id="the-basics">
                                        <input class="typeahead form-control" type="text" name="asal_sekolah_provinsi" placeholder="Provinsi" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-3">
                            <input type="text" name="no_skhun" class="form-control" id="exampleInputEmail1"  placeholder="No SKHUN" required>

                        </div>

                        <div class="form-group mt-3">
                            <label>Foto / Scan Surat SKHUN</label>
                            <input type="file" name="foto_scan_surat_skhun" class="form-control" id="exampleInputEmail1"  placeholder="Foto / Scan" required>
                        </div>



                        <h5 class="h5 m-0 mb-2 mt-5  p-0">Data Nilai</h5>
                        <label class="mb-3 font-italic">Jika hasilnya bulat maka kolom dibelakang koma diisi 00.</label>
                        {{-- <div class=" form-group">
                            <input type="text" name="nilai_bahasa_indonesia" class="form-control" id="exampleInputEmail1"  placeholder="Nilai Bahasa Indonesia" required>
                        </div>

                        <div class=" form-group">
                            <input type="text" name="nilai_mtk" class="form-control" id="exampleInputEmail1"  placeholder="Nilai Matematika" required>
                        </div>

                        <div class=" form-group">
                            <input type="text" name="nilai_ipa" class="form-control" id="exampleInputEmail1"  placeholder="Nilai Ilmu Pengetahuan Alam" required>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="de_indo" class="col-form-label ml-3">Bahasa Indonesia</label>
                                    <div class="col-sm-3">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" id="de_indo" name="de_indo" maxlength="2" required />
                                            <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                            <input type="text" class="form-control" id="be_indo" name="be_indo" maxlength="2" required />
                                        </div>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="de_mtk" class="col-form-label ml-3" style="margin-right:4%;">Matematika</label>
                                    <div class="col-sm-3">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" id="de_mtk" name="de_mtk" maxlength="2" required />
                                            <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                            <input type="text" class="form-control" id="be_mtk" name="be_mtk" maxlength="2" required />
                                        </div>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="de_ipa" class="col-form-label ml-3" style="margin-right:10%;">IPA</label>
                                    <div class="col-sm-3">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" id="de_ipa" name="de_ipa" maxlength="2" required />
                                            <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                            <input type="text" class="form-control" id="be_ipa" name="be_ipa" maxlength="2" required />
                                        </div>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div>
                        </div>
                            

                        <br>
                        
                        <div class="form-group row mb-0">
                            <div class="col-6">
                                <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100  px-4 font-14">Simpan<i class="fa fa-save ml-2"></i></button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--================Service Area End =================-->
@endsection