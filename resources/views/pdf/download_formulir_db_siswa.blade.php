<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>


	<table width="100%">
		<tr>
			<td width="10%" align="center">
				<img src="C:\laragon\www\ppdb-online\public\safario\img\gallery\KOTA_BEKASI.jpg" alt="" width="100px" height="100px">
			</td>
			<td width="80%" align="center">
					<font size="4">DINAS PENDIDIKAN KOTA BEKASI</font> <br>
					<font size="5"><b>SMKN 4 Kota Bekasi</b></font><br>
					<font size="2">JL.GANDARIA KRANGGAN WETAN KELURAHAN JATIRANGGA KECAMATAN JATISAMPURNA</font><br>
					<font size="2">KOTA BEKASI 17434</font><br>
			</td>
			<td width="10%" align="center">
				<img src="C:\laragon\www\ppdb-online\public\safario\img\gallery\SMKN4.png" alt="" width="100px" height="100px">
			</td>
		</tr>
    </table>
    <br>

    
    <div class="row">
        <div class="col-md-12 mt-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">DATA SISWA</li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr>
                            <th>Kode Pendaftaran</th>
                            <td>:</td>
                            <td>{{$data->code_pendaftaran}}</td>
                        </tr>
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
                            <th>Alamat Rumah</th>
                            <td>:</td>
                            <td>{{$data->alamat_jalan}} RT.{{$data->alamat_rt}} RW.{{$data->alamat_rw}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>Kelurahan {{$data->alamat_kelurahan}},  Kecamatan {{$data->alamat_kecamatan}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td> Kota/Kabupaten {{$data->alamat_kota_kabupaten}},  Provinsi {{$data->alamat_provinsi}}</td>
                        </tr>
                        <tr>
                            <th>Kode POS</th>
                            <td>:</td>
                            <td>Kode POS {{$data->alamat_kode_pos}}</td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>

        <div class="col-md-12" style="margin-top:580px;">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">DATA SEKOLAH & NILAI</li>
                <li class="list-group-item">
                    <table class="table w-100">
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
                </li>
            </ul>
        </div>
        
        <div class="col-sm-12 mt-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">DATA AYAH</li>
                <li class="list-group-item">
                    <table class="table w-100">
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
                </li>
            </ul>
        </div>    

        <div class="col-sm-12 mt-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">DATA IBU</li>
                <li class="list-group-item">
                    <table class="table w-100">
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
                </li>
            </ul>
        </div>  

        <div class="col-sm-12 mt-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">DATA WALI</li>
                <li class="list-group-item">
                    <table class="table w-100">
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
                </li>
            </ul>
        </div>  

    </div>



</body>
</html>
