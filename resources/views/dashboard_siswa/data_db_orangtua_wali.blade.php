@extends('layouts.master-dashboard-siswa-ppdb')
@section('br-mainpanel')


{{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home-db-siswa')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Update Data</a>
            <span class="breadcrumb-item active">Update Data Orangtua / Wali</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Update Data Orangtua / Wali</h4>
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
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                            </a>
                            <h4 class="card-title mb-md-0">Form Update Data Ayah</h4>
                        </div>
                        <br>                          
                        <form class="form-sample" action="{{route('update-db-orangtua-ayah', $data->data_ayah->id)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
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
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ayah" value="{{$data->data_ayah->pekerjaan_ayah}}">
                                            </div>
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
                                        <div class="form-group row">
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

    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                <div class="col-12 grid-margin ">
                        <div class="d-md-flex align-items-center mb-4">
                            <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                            </a>
                            <h4 class="card-title mb-md-0">Form Update Data Ibu</h4>
                        </div>
                        <br>                          
                        <form class="form-sample" action="{{route('update-db-orangtua-ibu', $data->data_ibu->id)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
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
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ibu" value="{{$data->data_ibu->pekerjaan_ibu}}">
                                            </div>
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
                                        <div class="form-group row">
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

    <div class="br-pagebody">
        <div class="br-section-wrapper bg-white shadow-sm">
            <div class="row justify-content-center ">
                <div class="col-12 grid-margin ">
                        <div class="d-md-flex align-items-center mb-4">
                            <a href="" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:25px;"></i>
                            </a>
                            <h4 class="card-title mb-md-0">Form Update Data Wali</h4>
                        </div>
                        <br>                          
                        <form class="form-sample" action="{{route('update-db-orangtua-wali', $data->data_wali->id)}}" method="POST" enctype="multipart/form-data">
                            {{method_field('put')}}
                            @csrf
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
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="" class="menu-item-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_wali" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Wali" value="{{$data->data_wali->pekerjaan_wali}}">
                                            </div>
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
                                        <div class="form-group row">
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