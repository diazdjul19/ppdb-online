<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download All Siswa Received</title>
   
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
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">
                    <br>
                    <p>Hallo Admin, Berikut Ini Merupakan Data Siswa Received. <br><br>
                        Tanggal : {{date("d M Y")}} <br>
                        Jam : {{date("H:i:s")}}
                    </p>


                </li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark text-center">Data Siswa Received (Di Terima).</li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr>
                            <th>No</th>
                            <th>Code Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>|</th>
                            <th>Asal Sekolah</th>
                            <th>NO SKHUN</th>
                            <th>Rata Nilai</th>

                        </tr>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->code_pendaftaran}}</td>
                            <td>{{$d->nama_calon_siswa}}</td>
                            <td>{{$d->nisn}}</td>
                            <td>{{$d->jenis_kelamin}}</td>
                            <td>{{$d->tempat_lahir}}, {{date('d M Y', strtotime($d->tanggal_lahir))}}</td>
                            <td>|</td>

                            @if ($d->data_sekolah_nilai == true)
                                <td>{{$d->data_sekolah_nilai->asal_sekolah_nama}}</td>
                                <td>{{$d->data_sekolah_nilai->no_skhun}}</td>
                                {{-- <th>{{$d->data_sekolah_nilai->nilai_bahasa_indonesia + $d->data_sekolah_nilai->nilai_mtk + $d->data_sekolah_nilai->nilai_ipa}}</th> --}}
                                <td>{{$d->data_sekolah_nilai->rata_nilai}}</td>
                            @elseif($d->data_sekolah_nilai != true)
                            
                            @endif
                        </tr>
                        @endforeach

                    </table>
                </li>
            </ul>            
        </div>
    </div>




</body>
</html>
