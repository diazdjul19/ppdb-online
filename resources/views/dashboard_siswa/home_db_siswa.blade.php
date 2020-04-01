@extends('layouts.master-dashboard-siswa-ppdb')
@section('br-mainpanel')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Dashboard</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        {{-- Alert --}}
            @if ($message = Session::get('gagal_masuk'))
                <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-danger">Hallo {{$data->nama_calon_siswa}}, Maaf Anda Sudah Tidak Memiliki Akses</h5>
                        <p class="mg-b-0 tx-gray">{{$message}}</p> <br>
                        <li>Silahkan hubungi operator PPDB jika anda memiliki masalah.</li>

                    </div>
                    </div><!-- d-flex -->
                </div><!-- alert -->
            @endif
        <!-- alert -->

        <div class="row row-sm">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header tx-medium bd-0 tx-white bg-mantle">
                        Profile Siswa
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle " style="width:130px;height:135px;" src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}" alt="">
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
                                        <th><strong class="tx-inverse tx-medium">Status</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{$data->status}}</span></th>
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
                                
                                <br>
                                <a href="{{route('download-formulir-db-siswa' , $data->enter_code)}}" class="btn btn-primary"><i class="fa fa-download mg-r-10"></i>Download Formulir</a>
                                <!-- add more here -->
                            </ul>
                        </div><!-- card-body -->
                    </div>
                    
                </div><!-- card -->
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
                                                <td>{{$data->data_ayah->no_hp}}</td>

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
                                                <td>{{$data->data_ibu->no_hp}}</td>

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
                                                <td>{{$data->data_wali->no_hp}}</td>

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
                                                <img class="img-fluid" alt="Responsive image"  src="{{url('/storage/foto_scan_surat_skhun/'.$data->data_sekolah_nilai->foto_scan_surat_skhun)}}" alt="">
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
