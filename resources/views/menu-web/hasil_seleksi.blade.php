@extends('layouts.master-web-ppdb')

@section('content-web')
    <!--================Service Area Start =================-->
    <section class="hero-banner">
        <div class="container">
        <div class="section-intro text-center ">
            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
        </div>

        <div class="row">
            <div class="col-md-12 bg-white shadow-sm p-5 mt-sm-5">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                                <div class="table-wrapper table-responsive-sm">
                                    <table id="table_id" class="table display responsive nowrap" >
                                        <thead class="thead-colored thead-primary">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">NIK</th>
                                                <th class="text-center">NISN</th>
                                                <th class="text-center">Nama Siswa</th>
                                                <th class="text-center">Jenis Kelamin</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td class="text-center">{{$d->nik}}</td>
                                                    <td class="text-center">{{$d->nisn}}</td>
                                                    <td class="text-center">{{$d->nama_calon_siswa}}</td>
                                                    <td class="text-center">
                                                        @if ($d->jenis_kelamin == 'laki-laki')
                                                            <span class="badge badge-primary p-1" style="font-size:12px;">Laki - Laki</span> 
                                                        @elseif($d->jenis_kelamin == 'perempuan')
                                                            <span class="badge badge-danger p-1" style="font-size:12px;">Perempuan</span> 
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($d->status == 'rejected')
                                                            <span class="badge badge-danger p-1" style="font-size:12px;">Di Tolak</span> 
                                                        @elseif($d->status == 'process')
                                                            <span class="badge badge-warning p-1" style="font-size:12px;">Sedang Proses</span> 
                                                        @elseif($d->status == 'received')
                                                        <span class="badge badge-success p-1" style="font-size:12px;">Di Terima</span> 
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================Service Area End =================-->
@endsection

@push('footer-web')
    <script>
        $(document).ready( function () {
            // DataTable Biasa
            $('#table_id').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
        } );
    </script>
@endpush