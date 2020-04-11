@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <a class="breadcrumb-item" href="{{route('siswa-process')}}">Management Siswa Process</a>
            <span class="breadcrumb-item active">Create New Siswa</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-plus-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Create User</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            
                <h6 class="br-section-label">Formulir Pendaftaran Siswa Baru</h6>
                <p class="br-section-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

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

                    <form action="{{route('siswa-process-store')}}" method="POST" enctype="multipart/form-data">
                        <div id="wizard1">
                            @csrf
                                <h3>Data Diri Calon Siswa</h3>
                                <section>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{-- <h5 class="h5 m-0 mb-4 p-0">Data Diri Calon Siswa</h5> --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">CodeDaftar<span style="color:red;"> *</span></label>                                    
                                                        <div class="col-md-9">
                                                            <input type="text" name="code_pendaftaran" class="form-control" id="exampleInputEmail1"  placeholder="Code Pendaftaran" value="{{$random_string}}" readonly >
                                                            <span class="text-danger">{{ $errors->first('code_pendaftaran') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">NIK<span style="color:red;"> *</span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nik" class="form-control" id="exampleInputEmail1"  placeholder="NIK" autofocus maxlength="17">
                                                            <span class="text-danger">{{ $errors->first('nik') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">NISN<span style="color:red;"> *</span></label>                                    
                                                        <div class="col-md-9">
                                                            <input type="text" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="NISN" maxlength="10">
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
                                                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nama<span style="color:red;"> *</span></label>                                    
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_calon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Nama Calon Siswa">
                                                            <span class="text-danger">{{ $errors->first('Kewarganegaraan') }}</span>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label  class="col-md-3 col-form-label" for="exampleInputEmail1">JK<span style="color:red;"> *</span></label>                                
                                                        <div class="col-md-9" >
                                                            <select class="form-control" name="jenis_kelamin" id="">
                                                                <optgroup label="Jenis Kelamin">
                                                                    <option value="disabled" disabled selected>Option</option>
                                                                    <option value="laki-laki">Laki-laki</option>
                                                                    <option value="perempuan">Perempuan</option>
                                                                </optgroup>
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
                                                        <label  class="col-md-3 col-form-label" for="exampleInputEmail1">Negara<span style="color:red;"> *</span></label>                                
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="kewarganegaraan" id="">
                                                                <optgroup label="Kewarganegaraan">
                                                                    <option value="disabled" disabled selected>Option</option>
                                                                    <option value="WNI">Warga Negara Indonesia</option>
                                                                    <option value="WNA">Warga Negara Asing</option>
                                                                </optgroup>
                                                            </select>
                                                            <span class="text-danger">{{ $errors->first('kewarganegaraan') }}</span>

                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group row">                      
                                                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">TTL<span style="color:red;"> *</span></label>                                    
                                                        <div class="col">
                                                            <label>Tempat Lahir</label>
                                                            <div id="the-basics">
                                                            <input class="typeahead form-control" name="tempat_lahir" type="text">
                                                            <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>

                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label>Tanggal Lahir</label>
                                                            <div id="bloodhound">
                                                            <input class="typeahead form-control" name="tanggal_lahir" type="date" >
                                                            <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Tinggal Bersama</label>                                
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="tinggal_bersama" id="">
                                                            <optgroup label="Tinggal Bersama">
                                                                <option value="disabled" disabled selected>Option</option>
                                                                <option value="ayah_ibu">Ayah & Ibu</option>
                                                                <option value="kakek_nenek">Kakek & Nenek</option>
                                                                <option value="wali_saudara">Wali / Saudara</option>
                                                                <option value="asrama">Asrama</option>
                                                                <option value="sendiri">Sendiri</option>
                                                            </optgroup>
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
                                                    <h5 class="h5 m-0 mb-4 mt-5 p-0">Data Alamat Calon Siswa</h5>
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
                                        </div>
                                    </div>
                                </section>


                                <h3>Orangtua & Wali</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row justify-content-center ">
                                                <div class="col-12 grid-margin ">
                                                        <div class="d-md-flex align-items-center mb-4">
                                                            <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                                            </a>
                                                            <h4 class="card-title mb-md-0">Form Update Data Ayah</h4>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nama Ayah</label>
                                                                        <input type="text" name="nama_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ayah">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">NIK</label>
                                                                        <input type="text" name="nik_ayah" class="form-control" id="exampleInputEmail1"  placeholder="NIK Ayah" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ayah">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tempat Lahir</label>
                                                                        <input type="text" name="tempat_lahir_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir"  >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                                        <input type="date" name="tanggal_lahir_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label>Pendidikan Terakhir</label>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_ayah">                                                                 
                                                                            <optgroup label="Pendidikan Ayah">  
                                                                                <option value="disabled" disabled selected>Option</option>
                                                                                <option value="SD/MI">SD / MI</option>
                                                                                <option value="SMP/MTS">SMP / MTS</option>
                                                                                <option value="SMA/SMK/Aliyah">SMA / SMK / Aliyah</option>
                                                                                <option value="S1">S1</option>
                                                                                <option value="S2">S2</option>
                                                                                <option value="S3">S3</option>
                                                                                <option value="D1">D1</option>
                                                                                <option value="D2">D2</option>
                                                                                <option value="D3">D3</option>
                                                                            </optgroup>                                             
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nomer Handphone</label>
                                                                        <input type="text" name="no_hp_ayah" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Alamat</label>
                                                                        <input type="text" name="alamat_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Alamat" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="col-12 grid-margin ">
                                                        <br>
                                                        <div class="d-md-flex align-items-center mb-4">
                                                            <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                                            </a>
                                                            <h4 class="card-title mb-md-0">Form Update Data Ibu</h4>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nama Ibu</label>
                                                                        <input type="text" name="nama_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ibu"  >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">NIK</label>
                                                                        <input type="text" name="nik_ibu" class="form-control" id="exampleInputEmail1"  placeholder="NIK Ibu">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ibu" >
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tempat Lahir</label>
                                                                        <input type="text" name="tempat_lahir_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                                        <input type="date" name="tanggal_lahir_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label>Pendidikan Terakhir</label>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_ibu">
                                                                                <optgroup label="Pendidikan Ibu">  
                                                                                <option value="disabled" disabled selected>Option</option>                                                                   
                                                                                <option value="SD/MI">SD / MI</option>
                                                                                <option value="SMP/MTS">SMP / MTS</option>
                                                                                <option value="SMA/SMK/Aliyah">SMA / SMK / Aliyah</option>
                                                                                <option value="S1">S1</option>
                                                                                <option value="S2">S2</option>
                                                                                <option value="S3">S3</option>
                                                                                <option value="D1">D1</option>
                                                                                <option value="D2">D2</option>
                                                                                <option value="D3">D3</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nomer Handphone</label>
                                                                        <input type="text" name="no_hp_ibu" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Alamat</label>
                                                                        <input type="text" name="alamat_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Alamat">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="col-12 grid-margin ">
                                                        <br>
                                                        <div class="d-md-flex align-items-center mb-4">
                                                            <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                                            </a>
                                                            <h4 class="card-title mb-md-0">Form Update Data Wali</h4>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nama Wali</label>
                                                                        <input type="text" name="nama_wali" class="form-control" id="exampleInputEmail1"  placeholder="Nama Wali"  >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">NIK</label>
                                                                        <input type="text" name="nik_wali" class="form-control" id="exampleInputEmail1"  placeholder="NIK Wali" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan_wali" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Wali" >
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tempat Lahir</label>
                                                                        <input type="text" name="tempat_lahir_wali" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                                        <input type="date" name="tanggal_lahir_wali" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <label>Pendidikan Terakhir</label>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_wali">
                                                                            <optgroup label="Pendidikan Wali">  
                                                                                <option value="disabled" disabled selected>Option</option>
                                                                                <option value="SD/MI">SD / MI</option>
                                                                                <option value="SMP/MTS">SMP / MTS</option>
                                                                                <option value="SMA/SMK/Aliyah">SMA / SMK / Aliyah</option>
                                                                                <option value="S1">S1</option>
                                                                                <option value="S2">S2</option>
                                                                                <option value="S3">S3</option>
                                                                                <option value="D1">D1</option>
                                                                                <option value="D2">D2</option>
                                                                                <option value="D3">D3</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label>Jenis Kelamin</label>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin_wali">
                                                                            <optgroup label="Gender"> 
                                                                                <option value="disabled" disabled selected>Option</option>
                                                                                <option value="laki-laki">Laki-laki</option>
                                                                                <option value="perempuan">Perempuan</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Nomer Handphone</label>
                                                                        <input type="text" name="no_hp_wali" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone"  >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="menu-item-label">Alamat</label>
                                                                        <textarea class="form-control" name="alamat_wali"  placeholder="Alamat" id="" cols="40" rows="5"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                </div>
                                                <br>
                                        </div>
                                        </div>
                                    </div>
                                </section>


                                <h3>Sekolah & Nilai</h3>
                                <section>
                                    <div class="col-12 grid-margin ">
                                        <br>                          
                                        
                                        <h5 class="h5 m-0 mb-2 p-0">Data Asal Sekolah</h5>
                                        <div class="form-group">
                                            {{-- ID Calon Siswa
                                            <input type="hidden" name="id_table_ms_prospective_students" value="{{$data->data_sekolah_nilai->id}}"> --}}
                                            {{-- ID Calon Siswa --}}
                                            <input type="text" name="asal_sekolah_nama" class="form-control" id="exampleInputEmail1" required placeholder="Nama Sekolah" >
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label>Kota Sekolah Asal</label>
                                                    <div id="the-basics">
                                                        <input class="typeahead form-control" type="text" name="asal_sekolah_kota"required  placeholder="Kota / Kabupaten" >
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Provinsi Sekolah Asal</label>
                                                    <div id="the-basics">
                                                        <input class="typeahead form-control" type="text" name="asal_sekolah_provinsi"required  placeholder="Provinsi" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group mt-3">
                                            <input type="text" name="no_skhun" class="form-control" id="exampleInputEmail1" required  placeholder="No SKHUN" >
                                        </div>

                                        <div class="form-group mt-3">
                                            <label>Foto / Scan Surat SKHUN</label>
                                            <input type="file" name="foto_scan_surat_skhun" class="form-control" id="exampleInputEmail1" required  placeholder="Foto / Scan">
                                        </div>




                                        <h5 class="h5 m-0 mb-2 mt-5  p-0">Data Nilai</h5>
                                        <label class="mb-3 font-italic">Jika hasilnya bulat maka kolom dibelakang koma diisi 00.</label>

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
                                                    <label for="de_mtk" class="col-form-label ml-3" style="margin-right:4.5%;">Matematika</label>
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
                                                    <label for="de_ipa" class="col-form-label ml-3" style="margin-right:10.5%;">IPA</label>
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
                                                {{-- <a href="{{route('siswa-process-store')}}" type="submit "class="btn btn-primary  w-100  px-4 font-14">Simpan <i class="fa fa-save ml-2"></i></a> --}}
                                                <button type="submit" class="btn btn-primary w-100  px-4 font-14">Simpan<i class="fa fa-save ml-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                        </div>
                    </form>
        </div>
    </div>
@endsection

@push('script-1')
    <script>
        $(document).ready(function() {
            'use strict';
            $('#wizard1').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
                
            });
        });
    </script>
@endpush
