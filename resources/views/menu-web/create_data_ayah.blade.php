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
                            <h3 class="h3">Form Data Ayah</h3>

                            <form action="{{route('data-ayah-store')}}" method="POST">
                                @csrf
                                <hr>
                                <h5 class="h5 m-0 mb-2 p-0">Data Diri</h5>
                                <div class="form-group">
                                    <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control form-main font-14" id="" value="">
                                    <input type="hidden" name="id_table_ms_prospective_students" value="{{$data->id}}">

                                </div>

                                <div class="form-group">
                                    <input type="text" name="nik_ayah" placeholder="NIK Ayah" class="form-control form-main font-14" id="" value="">
                                </div>

                                <div class="form-group">
                                    <div class="form-group row">
                                        <div class="col">
                                            <label>Tempat Lahir</label>
                                            <div id="the-basics">
                                            <input class="typeahead form-control" name="tempat_lahir_ayah" type="text" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Tanggal Lahir</label>
                                            <div id="bloodhound">
                                            <input class="typeahead form-control" name="tanggal_lahir_ayah" type="date" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="pendidikan_terakhir_ayah" id="" required>
                                            <option value="disabled" disabled selected>Pendidikan Terakhir</option>
                                            <option value="SD/MI">SD / MI</option>
                                            <option value="SMP/MTS">SMP / MTS</option>
                                            <option value="SMA/SMK/Aliyah">SMA/SMK/Aliyah</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control form-main font-14" id="" value="">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" name="alamat_ayah" placeholder="Alamat Ayah" class="form-control form-main font-14" id="" value="">
                                </div>

                                <h5 class="h5 m-0 mb-2 mt-2 p-0">Kontak</h5>
                                <div class=" form-group">
                                    <input type="text" name="no_hp_ayah" class="form-control form-main font-14" placeholder="Telp.Orangtua (Ayah)" id="" value="">
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-6">
                                        <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100  px-4 font-14">Selanjutnya <i class="fa fa-arrow-alt-circle-right"></i></button>
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
                        Form Data Ayah
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <p>Berisikan Data / Informasi Ayah Kandung Calon Siswa.</p>
                    </div><!-- card-body -->
                </div><!-- card -->
                <br>
                <div class="card bd-0">
                    <div class="card-header bg-firewatch">
                        Form Alert
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <p>Di mohon kepada calon pendaftar untuk tidak keluar dari halaman ini, sebelum mengklik tombol (Selanjutnya).</p>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>

        </div>

    </section>
    <!--================Service Area End =================-->
@endsection