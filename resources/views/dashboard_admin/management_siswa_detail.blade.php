@extends('layouts.master-admin-ppdb')
@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>

            @if ($data->status == 'process')
                <a class="breadcrumb-item" href="{{route('siswa-process')}}">Management Siswa Process</a>
                <span class="breadcrumb-item active">Detail Siswa Process</span>
            @elseif($data->status == 'received')
                <a class="breadcrumb-item" href="{{route('siswa-received')}}">Management Siswa Received</a>
                <span class="breadcrumb-item active">Detail Siswa Received</span>
            @elseif($data->status == 'rejected')
                <a class="breadcrumb-item" href="{{route('siswa-rejected')}}">Management Siswa Rejected</a>
                <span class="breadcrumb-item active">Detail Siswa Rejected</span>
            @endif
            
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-info-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Detail Siswa Process</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    <div class="br-pagebody">

        <div class="row row-sm">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header tx-medium bd-0 tx-white bg-mantle">
                        Profile Siswa
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            @if($data->foto_siswa == true)
                                {{-- Mengambil foto dari storage bawwan laravel --}}
                                {{-- <img class="img-fluid rounded-circle " style="width:130px;height:135px;" src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}" alt=""> --}}

                                {{-- Mengambil foto dari storage cloudinary --}}
                                <img class="img-fluid rounded-circle " style="width:130px;height:135px;" src="{{$data->foto_siswa}}" alt="">
                            @elseif ($data->foto_siswa == false)
                                <img src="/image-tambahan/user-polos.png" class="img-fluid rounded-circle " style="width:130px;height:135px;" alt="">
                            @endif
                            

                        </div>

                        <div class="rounded-bottom mt-3">
                            <ul class="list-group">
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">NISN</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{$data->nisn}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Nama</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{$data->nama_calon_siswa}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Tanggal Daftar</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{date('d M Y', strtotime($data->created_at))}}</span></th>
                                    </tr>
                                    </p>
                                </li>


                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Status</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">
                                            @if ($data->status == 'process')
                                                <span class="badge badge-warning" style="font-size:12px;">Menunggu</span> 
                                            @elseif($data->status == 'received')
                                                <span class="badge badge-success" style="font-size:12px;">Di Terima</span>
                                            @elseif($data->status == 'rejected')
                                                <span class="badge badge-danger" style="font-size:12px;">Di Tolak</span> 
                                            @endif 
                                        </span></th>
                                    </tr>
                                    </p>
                                </li>


                                @if ($data->status == 'process' )
                                    <li class="list-group-item rounded-top-0">
                                        <p class="mg-b-0">
                                        <i class="fa fa-tags tx-info mg-r-8"></i>
                                        <tr>
                                            <th><strong class="tx-inverse tx-medium">Action</strong></th>
                                            <td><span class="text-muted">:</span></td>
                                            <th><span class="text-muted">
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2 ml-3 mr-1" href="{{route('siswa-detail.received', $data->id)}}"><i class="fa fa-user-check mr-2"></i>Terima</a>
                                                    <a class="badge badge-danger p-2 ml-1" href="{{route('siswa-detail.rejected', $data->id)}}"><i class="fa fa-user-times mr-2"></i>Tolak</a>
                                                </td>
                                            </span></th>
                                        </tr>
                                        </p>
                                    </li>
                                @elseif($data->status == 'received')
                                    <br>
                                    <a href="{{route('download-formulir-db-siswa' , $data->enter_code)}}" class="btn btn-primary"><i class="fa fa-download mg-r-10"></i>Download Formulir</a>
                                @elseif($data->status == 'rejected')

                                @endif
                                


                                
                                <!-- add more here -->
                            </ul>
                        </div><!-- card-body -->
                    </div>
                </div><!-- card -->

                <br>

                @if ($data->data_sekolah_nilai != true)
                    <div class="card">
                        <div class="card-header tx-medium bd-0 tx-white bg-dance">
                        Hallo, {{Auth::user()->name}}
                        </div><!-- card-header -->
                        <div class="card-body bd bd-t-0 rounded-bottom">
                        <p class="mg-b-0">PERINGATAN, Calon siswa  bernama "{{$data->nama_calon_siswa}}" dengan nomer NISN "{{$data->nisn}}", Belum mengupload data nilai.</p>
                        </div><!-- card-body -->
                    </div><!-- card -->
                @else
                    
                @endif
                



            </div>

            <div class="col-sm-8">
                <div class="br-section-wrapper">
                    <div id="wizard1">
                        <h3>Data Diri Siswa</h3>
                        <section>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <tr>
                                                <th>Nama</th>
                                                <td>:</td>
                                                <td>{{$data->nama_calon_siswa}}</td>
                                            </tr>
                                            <tr>
                                                <th>NISN</th>
                                                <td>:</td>
                                                <td>{{$data->nisn}}</td>

                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{$data->nik}}</td>

                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($data->jenis_kelamin == 'laki-laki')
                                                        <span>Laki-laki</span>
                                                    @elseif($data->jenis_kelamin == 'perempuan')
                                                        <span>Perempuan</span>    
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>Kewarganegaraan</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($data->kewarganegaraan == 'WNI')
                                                        <span>Warga Negara Indonesia (WNI)</span>
                                                    @elseif($data->kewarganegaraan == 'WNA')
                                                        <span>Warga Negara Asing (WNA)</span>    
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <td>:</td>
                                                <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>

                                            </tr>
                                            <tr>
                                                <th>Tinggal Bersama</th>
                                                <td>:</td>
                                                <td>
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
                                                </td>

                                            </tr>

                                            <tr>
                                                <th>Gelombang Pendaftaran</th>
                                                <td>:</td>
                                                <td>{{$data->gelombang_pendaftaran}}</td>
                                            </tr>

                                            <tr>
                                                <th>Alamat Rumah & RT / RW</th>
                                                <td>:</td>
                                                <td>{{$data->alamat_jalan}} RT.{{$data->alamat_rt}} RW.{{$data->alamat_rw}}</td>

                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>:</td>
                                                <td>Kelurahan {{$data->alamat_kelurahan}},  Kecamatan {{$data->alamat_kecamatan}},  Kota/Kabupaten {{$data->alamat_kota_kabupaten}},  Provinsi {{$data->alamat_provinsi}},  Kode POS {{$data->alamat_kode_pos}}</td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>    
                            </div>
                        </section>

                        <h3>Orangtua & Wali</h3>
                        <section>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <h6 class="ml-2" style="color:#000;">Data Ayah Siswa</h6>  
                                            <tr>
                                                <th>Nama Ayah</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->nama_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->nik_ayah}}</td>

                                            </tr>
                                            <tr>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->tempat_lahir_ayah}},
                                                    @if ($data->data_ayah->tanggal_lahir_ayah != null)
                                                        {{date('d M Y', strtotime($data->data_ayah->tanggal_lahir_ayah))}}
                                                    @else
                                                        <span></span>
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->pekerjaan_ayah}}</td>

                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->pendidikan_terakhir_ayah}}</td>

                                            </tr>
                                            <tr>
                                                <th>Nomer Handphone</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->no_hp_ayah}}</td>

                                            </tr>
                                            <tr>
                                                <th>ALamat</th>
                                                <td>:</td>
                                                <td>{{$data->data_ayah->alamat_ayah}}</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>    

                                <div class="col-sm-12 mt-3">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <h6 class="ml-2" style="color:#000;">Data Ibu Siswa</h6>  
                                            <tr>
                                                <th>Nama Ibu</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->nama_ibu}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->nik_ibu}}</td>

                                            </tr>
                                            <tr>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->tempat_lahir_ibu}},
                                                    @if ($data->data_ibu->tanggal_lahir_ibu != null)
                                                        {{date('d M Y', strtotime($data->data_ibu->tanggal_lahir_ibu))}}
                                                    @else
                                                        <span></span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->pekerjaan_ibu}}</td>

                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->pendidikan_terakhir_ibu}}</td>

                                            </tr>
                                            <tr>
                                                <th>Nomer Handphone</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->no_hp_ibu}}</td>

                                            </tr>
                                            <tr>
                                                <th>ALamat</th>
                                                <td>:</td>
                                                <td>{{$data->data_ibu->alamat_ibu}}</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div> 


                                <div class="col-sm-12 mt-3">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <h6 class="ml-2" style="color:#000;">Data Wali Siswa</h6>  
                                            <tr>
                                                <th>Nama Wali</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->nama_wali}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->nik_wali}}</td>

                                            </tr>
                                            <tr>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->tempat_lahir_wali}},
                                                    @if ($data->data_wali->tanggal_lahir_wali != null)
                                                        {{date('d M Y', strtotime($data->data_wali->tanggal_lahir_wali))}}
                                                    @else
                                                        <span></span>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->jenis_kelamin_wali}}</td>

                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->pekerjaan_wali}}</td>

                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->pendidikan_terakhir_wali}}</td>

                                            </tr>
                                            <tr>
                                                <th>Nomer Handphone</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->no_hp_wali}}</td>

                                            </tr>
                                            <tr>
                                                <th>ALamat</th>
                                                <td>:</td>
                                                <td>{{$data->data_wali->alamat_wali}}</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>  

                            </div>
                        </section>

                        @if ($data->data_sekolah_nilai != true )
                            
                        @elseif($data->data_sekolah_nilai)
                            <h3>Sekolah & Nilai</h3>
                            <section>
                                <div class="col-sm-12 mt-4">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <h6 class="ml-2" style="color:#000;">Data Asal Sekolah Siswa</h6>  
                                            <tr>
                                                <th>Nama Sekolah</th>
                                                <td>:</td>
                                                <td>{{$data->data_sekolah_nilai->asal_sekolah_nama}}</td>
                                            </tr>
                                            <tr>
                                                <th>Kota & Provinsi</th>
                                                <td>:</td>
                                                <td>{{$data->data_sekolah_nilai->asal_sekolah_kota}}, {{$data->data_sekolah_nilai->asal_sekolah_provinsi}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>  

                                <div class="col-sm-12 mt-5">
                                    <div class="table-responsive-sm">
                                        <table class="table w-100">
                                            <h6 class="ml-2" style="color:#000;">Data Nilai Siswa</h6>  
                                            <tr>
                                                <th>No SKHUN</th>
                                                <td>:</td>
                                                <td>{{$data->data_sekolah_nilai->no_skhun}}</td>
                                            </tr>
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
                                            <tr>
                                                <th>Nilai Bahasa Inggris</th>
                                                <td>:</td>
                                                <td>{{$data->data_sekolah_nilai->nilai_bahasa_inggris}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Rata-Rata Nilai</th>
                                                <td>:</td>
                                                <td>{{$rata_nilai}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>  

                                <div class="col-sm-12 mt-5">
                                    <table class="table w-100">
                                        <h6 class="text-center ml-2" style="color:#000;">Foto / Scan Surat SKHUN</h6>
                                        <hr>
                                        <tr>
                                            <div class="text-center">
                                                @if($data->data_sekolah_nilai->foto_scan_surat_skhun)
                                                    {{-- Mengambil foto dari storage bawwan laravel --}}
                                                    {{-- <img class="img-fluid" alt="Responsive image"  src="{{url('/storage/foto_scan_surat_skhun/'.$data->data_sekolah_nilai->foto_scan_surat_skhun)}}" alt=""> --}}

                                                    {{-- Mengambil foto dari storage cloudinary --}}
                                                    <img class="img-fluid" alt="Responsive image"  src="{{$data->data_sekolah_nilai->foto_scan_surat_skhun}}" alt="">
                                                @elseif ($data->data_sekolah_nilai->foto_scan_surat_skhun != true)
                                                    <span>Foto Tidak Ada</span>
                                                @endif
                                               

                                            </div>

                                        </tr>
                                    </table>
                                </div>  

                            </section>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div><!-- row -->

        </div><!-- br-pagebody -->
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

