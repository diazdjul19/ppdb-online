<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->subject}}</title>    
</head>
<body>
    <p>Kepada Admin Yang Terhormat</p>
    <p>Seseorang Melaporkan Bugs Dengan Subject "{{$data->subject}}".</p>

    <table >
        <tr style="text-align:left;">
            <th>
                <h3>Detail Pelapor Bugs</h3>            
            </th>
        </tr>
        <tr style="text-align:left;">
            <th>Subject</th>
            <th>:</th>
            <td>{{$data->subject}}</td>
        </tr>
        <tr style="text-align:left;">
            <th>Nama</th>
            <th>:</th>
            <td>{{$data->name}}</td>
        </tr>
        <tr style="text-align:left;">
            <th>Email</th>
            <th>:</th>
            <td>{{$data->email}}</td>
        </tr>
        <tr style="text-align:left;">
            <th>Tanggal Laporan</th>
            <th>:</th>
            <td>{{date('d M Y H:i', strtotime($data->created_at))}}</td>
        </tr>
    </table>

    <p>Untuk Mengecek Isi Laporan Dari "{{$data->name}}" Silahkan Login <a href="http://ppdb.digitaltech.id/login">DiSini.</a></p>
</body>
</html>