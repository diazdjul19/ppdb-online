@extends('layouts.master-admin-ppdb')
@section('br-mainpanel')


{{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home-db-siswa')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>

            @if ($data->status == 'process')
                <a class="breadcrumb-item" href="{{route('siswa-process')}}">Management Siswa Process</a>
                    <span class="breadcrumb-item active">Update Data Siswa</span>
            @elseif($data->status == 'received')
                <a class="breadcrumb-item" href="{{route('siswa-received')}}">Management Siswa Received</a>
                    <span class="breadcrumb-item active">Update Data Siswa</span>
            @elseif($data->status == 'rejected')
                <a class="breadcrumb-item" href="{{route('siswa-rejected')}}">Management Siswa Rejected</a>
                    <span class="breadcrumb-item active">Update Data Siswa</span>
            @endif
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Update Data Siswa</h4>
            <p class="mg-b-0"></p>
        </div>

    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-success">{{$message}}</h5>
                    <p class="mg-b-0 tx-gray">Siswa login menggunakan NISN dan Password yang telah anda Update.</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-danger">Gagal Update Password Siswa !</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                <div class="col-12 grid-margin ">
                        <div class="d-md-flex align-items-center mb-4">
                            @if ($data->status == 'process')
                                <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @elseif($data->status == 'received')
                                <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @elseif($data->status == 'rejected')
                                <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @endif
                            <h3 class="card-title mb-md-0">Form Update Data Diri</h3>
                        </div>
                        <br>                          
                        <form class="form-sample" action="{{route('siswa-update-datadiri', $data->id)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama</label>
                                                <input type="text" name="nama_calon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Nama Siswa"  value="{{$data->nama_calon_siswa}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NISN</label>
                                                <input type="text" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="NISN" value="{{$data->nisn}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NIK</label>
                                                <input type="text" name="nik" class="form-control" id="exampleInputEmail1"  placeholder="NIK" value="{{$data->nik}}">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">No Akte Kelahiran</label>
                                                <input type="text" name="no_register_akte" class="form-control" id="exampleInputEmail1"  placeholder="No Akte Kelahiran"  value="{{$data->no_register_akte}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                                    <optgroup label="Gender Lama">
                                                        <option  value="{{$data->jenis_kelamin}}">
                                                            @if ($data->jenis_kelamin == 'laki-laki')
                                                                <span>Laki-laki</span>
                                                            @elseif($data->jenis_kelamin == 'perempuan')
                                                                <span>Perempuan</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Gender Baru">  
                                                        <option value="laki-laki">Laki-laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <label for="" class="menu-item-label">Agama</label>
                                            <input type="text" name="agama" class="form-control" id="exampleInputEmail1"  placeholder="Agama" value="{{$data->agama}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Tempat Lahir</label>
                                                <input class=" form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Tanggal Lahir</label>
                                                <input class=" form-control" name="tanggal_lahir" type="text" placeholder="Tanggal Lahir" value="{{$data->tanggal_lahir}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label>Warganegara</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="kewarganegaraan">
                                                    <optgroup label="Kewarganegaraan Lama">
                                                        <option  value="{{$data->kewarganegaraan}}">
                                                            @if ($data->kewarganegaraan == 'WNI')
                                                                <span>Warga Negara Indonesia</span>
                                                            @elseif($data->kewarganegaraan == 'WNA')
                                                                <span>Warga Negara Asing</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Kewarganegaraan Baru">  
                                                        <option value="WNI">Warga Negara Indonesia</option>
                                                        <option value="WNA">Warga Negara Asing</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Tinggal Bersama</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="tinggal_bersama">
                                                    <optgroup label="Tinggal Bersama Lama">
                                                        <option  value="{{$data->kewarganegaraan}}">
                                                            @if ($data->tinggal_bersama == 'ayah_ibu')
                                                                <span>Ayah & Ibu</span>
                                                            @elseif($data->tinggal_bersama == 'kakek_nenek')
                                                                <span>Kakek & Nenek</span>
                                                            @elseif($data->tinggal_bersama == 'wali_saudara')
                                                                <span>Wali / Saudara</span>
                                                            @elseif($data->tinggal_bersama == 'asrama')
                                                                <span>Asrama</span>
                                                            @elseif($data->tinggal_bersama == 'sendiri')
                                                                <span>Sendiri</span>        
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Kewarganegaraan Baru">  
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
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Nomer Handphone</label>
                                                <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1"  placeholder="Nomer Handphone" value="{{$data->no_hp}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="ml-3" >Foto Siswa</label>
                                        <div class="col-md-12 mb-2">
                                            @if($data->foto_siswa)
                                                <img src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}"
                                                width="100px">
                                            @endif
                                            <input type="file" class="form-control" name="foto_siswa">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Alamat Jalan / Gg</label>
                                                <input type="text" name="alamat_jalan" class="form-control" id="exampleInputEmail1"  placeholder="Alamat Jalan / Gg"  value="{{$data->alamat_jalan}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Alamat Dusun</label>
                                                <input type="text" name="alamat_dusun" class="form-control" id="exampleInputEmail1"  placeholder="Alamat Dusun" value="{{$data->alamat_dusun}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="">Kode POS</label>
                                                <input type="text" name="alamat_kode_pos" class="form-control" id="exampleInputEmail1"  placeholder="Kode POS" value="{{$data->alamat_kode_pos}}">
                                                    <span class="text-danger">{{ $errors->first('alamat_kode_pos') }}</span>

                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col">
                                                <label>RT</label>
                                                <div id="the-basics">
                                                    <input class="typeahead form-control" type="number" name="alamat_rt" placeholder="001" maxlength="3" value="{{$data->alamat_rt}}">
                                                    <span class="text-danger">{{ $errors->first('alamat_rt') }}</span>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>RW</label>
                                                <div id="the-basics">
                                                <input class="typeahead form-control" type="number" name="alamat_rw" placeholder="006" maxlength="3" value="{{$data->alamat_rw}}">
                                                    <span class="text-danger">{{ $errors->first('alamat_rw') }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Kelurahan</label>
                                                <input type="text" name="alamat_kelurahan" class="form-control" id="exampleInputEmail1"  placeholder="Kelurahan" value="{{$data->alamat_kelurahan}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="">Kecamatan</label>
                                                <input type="text" name="alamat_kecamatan" class="form-control" id="exampleInputEmail1"  placeholder="Kecamatan" value="{{$data->alamat_kecamatan}}">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Kota / Kabupaten</label>
                                                <input type="text" name="alamat_kota_kabupaten" class="form-control" id="exampleInputEmail1"  placeholder="Kota / Kabupaten"  value="{{$data->alamat_kota_kabupaten}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="">Provinsi</label>
                                                <input type="text" name="alamat_provinsi" class="form-control" id="exampleInputEmail1"  placeholder="Provinsi" value="{{$data->alamat_provinsi}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <label>Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                <optgroup label="Status Lama">
                                                    <option  value="{{$data->status}}">
                                                        @if ($data->status == 'process')
                                                            <span>Prosess</span>
                                                        @elseif($data->status == 'received')
                                                            <span>Terima</span> 
                                                        @elseif($data->status == 'rejected')
                                                            <span>Tolak</span> 
                                                        @endif
                                                    </option>
                                                </optgroup>  
                                                <optgroup label="Status Baru">  
                                                    <option value="process">Prosess</option>
                                                    <option value="received">Terima</option>
                                                    <option value="rejected">Tolak</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    

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

    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                @if ($data->data_sekolah_nilai != true)
                    <div class="alert alert-warning alert-bordered pd-y-20" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="icon ion-alert-circled alert-icon tx-52 tx-warning mg-r-20"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-warning">Hallo, {{Auth::user()->name}}</h5>
                            <p class="mg-b-0 tx-gray">PERINGATAN, Calon siswa  bernama "{{$data->nama_calon_siswa}}" dengan nomer NISN "{{$data->nisn}}", Belum mengupload data nilai.  </p>
                        </div>
                        </div><!-- d-flex -->
                    </div><!-- alert -->
                @else
                    <div class="col-12 grid-margin ">
                        <div class="d-md-flex align-items-center mb-4">

                            @if ($data->status == 'process')
                                <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @elseif($data->status == 'received')
                                <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @elseif($data->status == 'rejected')
                                <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                                </a>
                            @endif
                            <h3 class="card-title mb-md-0">Form Update Data Nilai</h3>
                        </div>
                        <br>                          
                        
                        <form action="{{route('siswa-update-data-nilai', $data->data_sekolah_nilai->id)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
                            <hr>
                            <h5 class="h5 m-0 mb-2 p-0">Data Asal Sekolah</h5>
                            <div class="form-group">
                                {{-- ID Calon Siswa --}}
                                <input type="hidden" name="id_table_ms_prospective_students" required value="{{$data->data_sekolah_nilai->id}}">
                                {{-- ID Calon Siswa --}}
                                <input type="text" name="asal_sekolah_nama" class="form-control" id="exampleInputEmail1"  placeholder="Nama Sekolah" required value="{{$data->data_sekolah_nilai->asal_sekolah_nama}}">
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Kota Sekolah Asal</label>
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="asal_sekolah_kota" placeholder="Kota / Kabupaten" required value="{{$data->data_sekolah_nilai->asal_sekolah_kota}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Provinsi Sekolah Asal</label>
                                        <div id="the-basics">
                                            <input class="typeahead form-control" type="text" name="asal_sekolah_provinsi" placeholder="Provinsi" required value="{{$data->data_sekolah_nilai->asal_sekolah_provinsi}}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mt-3">
                                <input type="text" name="no_skhun" class="form-control" id="exampleInputEmail1"  placeholder="No SKHUN" required value="{{$data->data_sekolah_nilai->no_skhun}}">
                            </div>

                            <div class="form-group mt-3">

                                <label class="" >Foto / Scan Surat SKHUN</label>
                                <div class="col-md-12">
                                    @if($data->foto_siswa)
                                        <img src="{{url('/storage/foto_scan_surat_skhun/'.$data->data_sekolah_nilai->foto_scan_surat_skhun)}}"
                                        width="100px">
                                    @endif
                                    <input type="file" class="form-control" name="foto_scan_surat_skhun">
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="col">
                                        <div id="the-basics">
                                            
                                            <h5 class="h5 m-0 mb-2 mt-5  p-0">Update Data Nilai</h5>
                                            <label class="mb-3 font-italic">Jika hasilnya bulat maka kolom dibelakang koma diisi 00.</label>

                                            <div class="form-group row">
                                                <label for="de_indo" class="col-form-label ml-3">Bahasa Indonesia</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control" id="de_indo" name="de_indo" maxlength="2"  value="">
                                                        <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                                        <input type="text" class="form-control" id="be_indo" name="be_indo" maxlength="2" />
                                                    </div>
                                                    @if ($message = Session::get('dedu_bindo'))
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    @endif
                                                </div>
                                            </div> <!-- /.form-group -->
                                        

                                            <div class="form-group row">
                                                <label for="de_mtk" class="col-form-label ml-3" style="margin-right:8%;">Matematika</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control" id="de_mtk" name="de_mtk" maxlength="2" />
                                                        <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                                        <input type="text" class="form-control" id="be_mtk" name="be_mtk" maxlength="2" />
                                                    </div>
                                                    @if ($message = Session::get('dedu_mtk'))
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    @endif
                                                </div>
                                            </div> <!-- /.form-group -->
                                        

                    
                                            <div class="form-group row">
                                                <label for="de_ipa" class="col-form-label ml-3" style="margin-right:19.5%;">IPA</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control" id="de_ipa" name="de_ipa" maxlength="2" />
                                                        <span class="addon ml-2 mr-2 mt-2"><b>,</b></span>
                                                        <input type="text" class="form-control" id="be_ipa" name="be_ipa" maxlength="2" />
                                                    </div>
                                                    @if ($message = Session::get('dedu_ipa'))
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    @endif
                                                </div>
                                            </div> <!-- /.form-group -->
                                        
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="the-basics">
                                            <div class="col-md-12" style="margin-top:50px;">
                                                <ul class="list-group">
                                                    <li class="list-group-item list-group-item-dark" style="font-weight:bold;">NILAI SEKARANG</li>
                                                    <li class="list-group-item">
                                                        <table class="table w-100">
                                                            <tr>
                                                                <th>Nilai Bahasa Indonesia</th>
                                                                <td>:</td>
                                                                <td>{{$data->data_sekolah_nilai->nilai_bahasa_indonesia}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nilai Matematika</th>
                                                                <td>:</td>
                                                                <td>{{$data->data_sekolah_nilai->nilai_mtk}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nilai IPA</th>
                                                                <td>:</td>
                                                                <td>{{$data->data_sekolah_nilai->nilai_ipa}}</td>
                                                            </tr>
                                                            <tr class="table-dark" style="color:black;">
                                                                <th>Total Rata-Rata Nilai</th>
                                                                <td>:</td>
                                                                <td>{{$rata_nilai}}</td>
                                                            </tr>
                                                        </table>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            
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
                @endif
                
            </div>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <form class="form-sample" action="{{route('siswa-update-data-orangtua-wali', $data->id)}}" method="POST" enctype="multipart/form-data">
                {{method_field('put')}}
                @csrf
                <div class="row justify-content-center ">
                        <div class="col-12 grid-margin ">
                                <div class="d-md-flex align-items-center mb-4">

                                    @if ($data->status == 'process')
                                        <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'received')
                                        <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'rejected')
                                        <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @endif
                                    <h4 class="card-title mb-md-0">Form Update Data Ayah</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama Ayah</label>
                                                <input type="text" name="nama_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ayah"  value="{{$data->data_ayah->nama_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NIK</label>
                                                <input type="text" name="nik_ayah" class="form-control" id="exampleInputEmail1"  placeholder="NIK Ayah" value="{{$data->data_ayah->nik_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ayah" value="{{$data->data_ayah->pekerjaan_ayah}}">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir"  value="{{$data->data_ayah->tempat_lahir_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir" value="{{$data->data_ayah->tanggal_lahir_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label>Pendidikan Terakhir</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_ayah">
                                                    <optgroup label="Pendidikan Lama">
                                                        <option  value="{{$data->data_ayah->pendidikan_terakhir_ayah}}">
                                                            @if ($data->data_ayah->pendidikan_terakhir_ayah == 'SD/MI')
                                                                <span>SD / MI</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'SMP/MTS')
                                                                <span>SMP / MTS</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'SMA/SMK/Aliyah')
                                                                <span>SMA / SMK / Aliyah</span>    
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'S1')
                                                                <span>S1</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'S2')
                                                                <span>S2</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'S3')
                                                                <span>S3</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'D1')
                                                                <span>D1</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'D2')
                                                                <span>D2</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'D3')
                                                                <span>D3</span>
                                                            @elseif($data->data_ayah->pendidikan_terakhir_ayah == 'D4')
                                                                <span>D4</span>
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Pendidikan Baru">  
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
                                                <input type="text" name="no_hp_ayah" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone"  value="{{$data->data_ayah->no_hp_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Alamat</label>
                                                <input type="text" name="alamat_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Alamat" value="{{$data->data_ayah->alamat_ayah}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>
                        <br>
                        <div class="col-12 grid-margin ">
                                <br>
                                <div class="d-md-flex align-items-center mb-4">

                                    @if ($data->status == 'process')
                                        <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'received')
                                        <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'rejected')
                                        <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @endif
                                    <h4 class="card-title mb-md-0">Form Update Data Ibu</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama Ibu</label>
                                                <input type="text" name="nama_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ibu"  value="{{$data->data_ibu->nama_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NIK</label>
                                                <input type="text" name="nik_ibu" class="form-control" id="exampleInputEmail1"  placeholder="NIK Ibu" value="{{$data->data_ibu->nik_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ibu" value="{{$data->data_ibu->pekerjaan_ibu}}">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir"  value="{{$data->data_ibu->tempat_lahir_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir" value="{{$data->data_ibu->tanggal_lahir_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label>Pendidikan Terakhir</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_ibu">
                                                    <optgroup label="Pendidikan Lama">
                                                        <option  value="{{$data->data_ibu->pendidikan_terakhir_ibu}}">
                                                            @if ($data->data_ibu->pendidikan_terakhir_ibu == 'SD/MI')
                                                                <span>SD / MI</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'SMP/MTS')
                                                                <span>SMP / MTS</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ayah == 'SMA/SMK/Aliyah')
                                                                <span>SMA / SMK / Aliyah</span>  
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'S1')
                                                                <span>S1</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'S2')
                                                                <span>S2</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'S3')
                                                                <span>S3</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'D1')
                                                                <span>D1</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'D2')
                                                                <span>D2</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'D3')
                                                                <span>D3</span>
                                                            @elseif($data->data_ibu->pendidikan_terakhir_ibu == 'D4')
                                                                <span>D4</span>
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Pendidikan Baru">  
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
                                                <input type="text" name="no_hp_ibu" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone"  value="{{$data->data_ibu->no_hp_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Alamat</label>
                                                <input type="text" name="alamat_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Alamat" value="{{$data->data_ibu->alamat_ibu}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>
                        <br>
                        <div class="col-12 grid-margin ">
                                <br>
                                <div class="d-md-flex align-items-center mb-4">

                                    @if ($data->status == 'process')
                                        <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'received')
                                        <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'rejected')
                                        <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @endif
                                    <h4 class="card-title mb-md-0">Form Update Data Wali</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama Wali</label>
                                                <input type="text" name="nama_wali" class="form-control" id="exampleInputEmail1"  placeholder="Nama Wali"  value="{{$data->data_wali->nama_wali}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NIK</label>
                                                <input type="text" name="nik_wali" class="form-control" id="exampleInputEmail1"  placeholder="NIK Wali" value="{{$data->data_wali->nik_wali}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_wali" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Wali" value="{{$data->data_wali->pekerjaan_wali}}">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir_wali" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir"  value="{{$data->data_wali->tempat_lahir_wali}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir_wali" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Lahir" value="{{$data->data_wali->tanggal_lahir_wali}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label>Pendidikan Terakhir</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="pendidikan_terakhir_wali">
                                                    <optgroup label="Pendidikan Lama">
                                                        <option  value="{{$data->data_wali->pendidikan_terakhir_wali}}">
                                                            @if ($data->data_wali->pendidikan_terakhir_wali == 'SD/MI')
                                                                <span>SD / MI</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'SMP/MTS')
                                                                <span>SMP / MTS</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'SMA/SMK/Aliyah')
                                                                <span>SMA / SMK / Aliyah</span>  
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'S1')
                                                                <span>S1</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'S2')
                                                                <span>S2</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'S3')
                                                                <span>S3</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'D1')
                                                                <span>D1</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'D2')
                                                                <span>D2</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'D3')
                                                                <span>D3</span>
                                                            @elseif($data->data_wali->pendidikan_terakhir_wali == 'D4')
                                                                <span>D4</span>
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Pendidikan Baru">  
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
                                                    <optgroup label="Gender Lama">
                                                        <option  value="{{$data->data_wali->jenis_kelamin_wali}}">
                                                            @if ($data->data_wali->jenis_kelamin_wali == 'laki-laki')
                                                                <span>Laki-laki</span>
                                                            @elseif($data->data_wali->jenis_kelamin_wali == 'perempuan')
                                                                <span>Perempuan</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Gender Baru">  
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
                                                <input type="text" name="no_hp_wali" class="form-control" id="exampleInputEmail1"  placeholder="No Handphone"  value="{{$data->data_wali->no_hp_wali}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Alamat</label>
                                                <textarea class="form-control" name="alamat_wali"  placeholder="Alamat" id="" cols="40" rows="5">{{$data->data_wali->alamat_wali}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                        </div>
                        <br>

                        <div class="col-12 grid-margin">
                            <br>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-6">
                                    <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100  px-4 font-14">Update<i class="fa fa-save ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <form class="form-sample" action="{{route('edit-password-siswa-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center ">
                        <div class="col-12 grid-margin ">
                                <div class="d-md-flex align-items-center mb-4">

                                    @if ($data->status == 'process')
                                        <a href="{{route('siswa-process')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'received')
                                        <a href="{{route('siswa-received')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @elseif($data->status == 'rejected')
                                        <a href="{{route('siswa-rejected')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                                        </a>
                                    @endif
                                    <h4 class="card-title mb-md-0">Form Edit Password Siswa</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama Siswa</label>
                                                <input type="text" name="nama_calon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ayah"  value="{{$data->nama_calon_siswa}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NISN</label>
                                                <input type="text" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="NIK Ayah" value="{{$data->nisn}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">New Password</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="password" name="password_pendaftaran" placeholder="Password" id="password" >
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                                                    </div>
                                                </div>
                                                <br>
                                                @if ($message = Session::get('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="d-flex align-items-center justify-content-start">
                                                            <i class="icon ion-ios-close alert-icon tx-30 tx-danger mg-r-20"></i>
                                                            <span><strong>{{ $message }}</strong></span>
                                                        </div><!-- d-flex -->
                                                    </div><!-- alert -->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Confirm Password</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" id="copassword">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                                                    </div>
                                                </div>
                                                <br>
                                                @if ($message = Session::get('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="d-flex align-items-center justify-content-start">
                                                            <i class="icon ion-ios-close alert-icon tx-30 tx-danger mg-r-20"></i>
                                                            <span><strong>{{ $message }}</strong></span>
                                                        </div><!-- d-flex -->
                                                    </div><!-- alert -->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <br>
                            
                                <div class="form-group row mb-0">
                                    <div class="col-6">
                                        <a href="" class="btn btn-warning  w-100  px-4 font-14">Refresh <i class="icon ion-loop"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100  px-4 font-14">Update<i class="fa fa-save ml-2"></i></button>
                                    </div>
                                </div>
                        </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('password-eye')
    <script>
        var state= false;
        function toggle1() {
            if (state) {
                document.getElementById(
                    "password").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye1").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye1").style.color='#5887ef';
                state = true;
            }
        }

        function toggle2() {
            if (state) {
                document.getElementById(
                    "copassword").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye2").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "copassword").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye2").style.color='#5887ef';
                state = true;
            }
        }
    </script>
@endpush