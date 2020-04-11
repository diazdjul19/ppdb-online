<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export All Siswa Received</title>
    
    <link rel="stylesheet" href="C:\laragon\www\ppdb-online\public\safario\vendors\bootstrap\bootstrap.min.css">
</head>

<body>

    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-light table-striped">
                <thead class="table-primary">
                    <tr>
                        <td><b>Kepada Yth: Admin PPDB Online</b></td>
                    </tr>
                    <tr>
                        <td><b>Berikut Ini Merupakan Data Siswa Received.</b></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal : {{date("d M Y")}}</b></td>
                    </tr>
                    <tr>
                        <td><b> Jam : {{date("H:i:s")}}</b></td>
                    </tr>

                    <tr></tr>
                    
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
                        <th>B.Indo</th>
                        <th>MTK</th>
                        <th>IPA</th>
                        <th>Rata Nilai</th>
                    </tr>
                </thead>
                <tbody>
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
                                <td>{{$d->data_sekolah_nilai->nilai_bahasa_indonesia}}</td>
                                <td>{{$d->data_sekolah_nilai->nilai_mtk}}</td>
                                <td>{{$d->data_sekolah_nilai->nilai_ipa}}</td>
                                <td>{{$d->data_sekolah_nilai->nilai_bahasa_indonesia + $d->data_sekolah_nilai->nilai_mtk + $d->data_sekolah_nilai->nilai_ipa}}</td>

                            @elseif($d->data_sekolah_nilai != true)
                            
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>