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
                                                    <td class="text-center">{{$d->jenis_kelamin}}</td>
                                                    <td class="text-center">{{$d->status}}</td>
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

