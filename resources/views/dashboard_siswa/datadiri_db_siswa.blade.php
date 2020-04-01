@extends('layouts.master-dashboard-siswa-ppdb')
@section('br-mainpanel')


{{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home-db-siswa')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Update Data</a>
            <span class="breadcrumb-item active">Update Data Diri</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Update Data Diri</h4>
            <p class="mg-b-0"></p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                <div class="col-12 grid-margin ">
                        <div class="d-md-flex align-items-center mb-4">
                            <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                            </a>
                            <h3 class="card-title mb-md-0">Form Update Data Diri</h3>
                        </div>
                        <br>                          
                        <form class="form-sample" action="{{route('update-datadiri-db-siswa', $data->enter_code)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Nama</label>
                                                <input type="text" name="" class="form-control" id="exampleInputEmail1"  placeholder="Nama Siswa"  value="{{$data->nama_calon_siswa}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NISN</label>
                                                <input type="text" name="" class="form-control" id="exampleInputEmail1"  placeholder="NISN" value="{{$data->nisn}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">NIK</label>
                                                <input type="text" name="" class="form-control" id="exampleInputEmail1"  placeholder="NIK" value="{{$data->nik}}" readonly>
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
                                </div>
                                
                                
                                
                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Update</span>
                                    </div>
                                </button>

                        </form>
                </div>
            </div>
        </div>
    </div>


@endsection