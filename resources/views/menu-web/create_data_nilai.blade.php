@extends('layouts.master-web-ppdb')
@section('content-web')
    <!--================Service Area Start =================-->
    <section class="hero-banner">
        <div class="container">
        <div class="section-intro text-center ">
            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
        </div>

        <div class="row">
            <div class="col-md-9 bg-white shadow-sm p-5 mt-sm-5">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                            <h2 class="h2 text-center">Form Data Sekolah ~ Nilai</h2>
                            <h5 class="h5 text-center">Silahkan Masukan Data Sekolah Dan Nilai UN Anda</h5>
                            <hr>

                            <form action="{{route('data-nilai-store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <hr>
                                <h5 class="h5 m-0 mb-2 p-0">Data Asal Sekolah</h5>
                                <div class="form-group">
                                    {{-- ID Calon Siswa --}}
                                    <input type="hidden" name="id_table_ms_prospective_students" required readonly value="{{$data->id}}">
                                    {{-- ID Calon Siswa --}}
                                    <input type="text" name="asal_sekolah_nama" class="form-control" id="exampleInputEmail1"  placeholder="Nama Sekolah" autofocus required>
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
                                            <label for="de_mtk" class="col-form-label ml-3" style="margin-right:5%;">Matematika</label>
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
                                            <label for="de_ipa" class="col-form-label ml-3" style="margin-right:12%;">IPA</label>
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

            <div class="col-md-3 mt-sm-5">
                <div class="card bd-0">
                    <div class="card-header bg-grandeur  ">
                        Form Data Nilai
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <p>Berisikan Data / Informasi Nilai Ujian Nasional Calon Siswa.</p>
                    </div><!-- card-body -->
                </div><!-- card -->
                <br>
                <div class="card bd-0">
                    <div class="card-header bg-firewatch">
                        Form Alert
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <p>Di mohon kepada calon pendaftar untuk tidak keluar dari halaman ini, sebelum mengklik tombol (Simpan).</p>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>
        </div>

    </section>
    <!--================Service Area End =================-->
@endsection