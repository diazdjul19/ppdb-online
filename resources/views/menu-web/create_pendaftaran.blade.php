@extends('layouts.master-web-ppdb')

@section('content-web')
    <!--================Service Area Start =================-->
    <section class="hero-banner">
        <div class="container">
        <div class="section-intro text-center ">
            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
        </div>

        <div class="container bg-white shadow-sm p-5 mt-sm-5">

            @if ($message = Session::get('gagal_daftar'))
                <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-danger">Gagal Mendaftar</h5>
                        <p class="mg-b-0 tx-gray">{{$message}}</p>
                    </div>
                    </div><!-- d-flex -->
                </div><!-- alert -->
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <h3 class="h3 text-center">Formulir Pendaftaran Siswa Baru</h3>
                        <hr>
                    </div>
                    <form class="form-sample" action="{{route('pendaftaran-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="h3 m-0 mb-4 p-0">Data Diri Calon Siswa</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Code Daftar &#9733;</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="code_pendaftaran" class="form-control" id="exampleInputEmail1"  placeholder="Code Pendaftaran" value="{{$random_string}}" readonly >
                                        <span class="text-danger">{{ $errors->first('code_pendaftaran') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">NIK &#9733;</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nik" class="form-control" id="exampleInputEmail1"  placeholder="NIK" autofocus maxlength="17" required>
                                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">NISN &#9733;</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="NISN" required maxlength="10">
                                        <span class="text-danger">{{ $errors->first('nisn') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">No Akte</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_register_akte" class="form-control" id="exampleInputEmail1"  placeholder="No Registarasi Akte" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nama &#9733;</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="nama_calon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Nama Calon Siswa" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label" for="exampleInputEmail1">JK &#9733;</label>                                
                                    <div class="col-md-9" >
                                        <select name="jenis_kelamin" required id="">
                                            <option value="disabled" disabled selected>Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        <br>
                                        <br>
                                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Agama</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="agama" class="form-control" id="exampleInputEmail1"  placeholder="Agama">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label" for="exampleInputEmail1">Warganegara&#9733;</label>                                
                                    <div class="col-md-9">
                                        <select name="kewarganegaraan" required id="">
                                            <option value="disabled" disabled selected>Kewarganegaraan</option>
                                            <option value="WNI">Warga Negara Indonesia</option>
                                            <option value="WNA">Warga Negara Asing</option>
                                        </select>
                                        <br>
                                        <br>
                                        <span class="text-danger">{{ $errors->first('kewarganegaraan') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group row">                      
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">TTL &#9733;</label>                                    
                                    <div class="col">
                                        <label>Tempat Lahir</label>
                                        <div id="the-basics">
                                        <input class="typeahead form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Lahir</label>
                                        <div id="bloodhound">
                                        <input class="typeahead form-control" name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="exampleInputEmail1">Tinggal Bersama</label>                                
                                <div class="col-md-9">
                                    <select name="tinggal_bersama" id="" required>
                                        <option value="disabled" disabled selected>Tinggal Bersama</option>
                                        <option value="ayah_ibu">Ayah & Ibu</option>
                                        <option value="kakek_nenek">Kakek & Nenek</option>
                                        <option value="wali_saudara">Wali / Saudara</option>
                                        <option value="asrama">Asrama</option>
                                        <option value="sendiri">Sendiri</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Foto Siswa</label>                                    
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="foto_siswa" class="form-control" id="customFile2">
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nomer HP</label>                                
                                <div class="col-md-9">
                                    <input type="text" name="no_hp"  class="form-control" id="exampleInputEmail1"  placeholder="Nomer HP">
                                </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="h3 m-0 mb-4 mt-5 p-0">Data Alamat Calon Siswa</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Gg / Jalan</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="alamat_jalan" class="form-control" id="exampleInputEmail1"  placeholder="Gg / Jalan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nama Dusun</label>
                                    <div class="col-md-9">
                                        <input type="text" name="alamat_dusun" class="form-control" id="exampleInputEmail1"  placeholder="Nama Dusun">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">RT ~ Rw </label>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="number" name="alamat_rt" placeholder="example : 001" maxlength="3">
                                            <span class="text-danger">{{ $errors->first('alamat_rt') }}</span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="number" name="alamat_rw" placeholder="example : 006" maxlength="3">
                                            <span class="text-danger">{{ $errors->first('alamat_rw') }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Kode POS</label>
                                    <div class="col-md-9">
                                        <input type="text" name="alamat_kode_pos" class="form-control" id="exampleInputEmail1"  placeholder="Kode POS">
                                            <span class="text-danger">{{ $errors->first('alamat_kode_pos') }}</span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Kelurahan ~ Kecamatan</label>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="alamat_kelurahan" placeholder="Kelurahan">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="alamat_kecamatan" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Kota ~ Provinsi</label>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="alamat_kota_kabupaten" placeholder="Kota / Kabupaten">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="alamat_provinsi" placeholder="Provinsi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="form-group row mb-0 mt-5">
                            <div class="col-3 offset-md-3">
                                <a href="{{route('home-web')}}" class="btn btn-danger  w-100  px-4 font-14">Batal</a>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary w-100  px-4 font-14">Selanjutnya <i class="fa fa-arrow-alt-circle-right"></i></button>
                            </div>
                        </div>
                        {{-- BUTTON --}}
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!--================Service Area End =================-->

@endsection