@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <span class="breadcrumb-item active">Management Siswa Received</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-user-check" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Siswa Received</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action Management Siswa Received
            </div><!-- col-4 -->

            <div class="ml-auto mb-3 mb-sm-0">
                <a href="{{route('export-received-excel')}}" class="btn btn-success btn-with-icon mr-2">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fas fa-file-excel" style="font-size:20px;" ></i></span>
                        <span class="pd-x-15">Download Excel</span>
                    </div>
                </a>

                <a href="{{route('downloadall-received-pdf')}}" class="btn btn-danger btn-with-icon">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fas fa-file-pdf" style="font-size:20px;" ></i></span>
                        <span class="pd-x-15">Download PDF</span>
                    </div>
                </a>
            </div>

            

        </div>
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-sm">
            <table id="table_id" class="table display responsive nowrap" >
                <thead class="thead-colored thead-indigo">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-4">{{$loop->iteration}}</td>
                            <td class="text-center pt-4">{{$d->nama_calon_siswa}}</td>
                            <td class="text-center pt-4">{{$d->nisn}}</td>
                            <td class="text-center pt-4">
                                @if ($d->jenis_kelamin == 'laki-laki')
                                    <span class="badge badge-primary p-1" style="font-size:12px;">Laki - Laki</span> 
                                @elseif($d->jenis_kelamin == 'perempuan')
                                    <span class="badge badge-danger p-1" style="font-size:12px;">Perempuan</span> 
                                @endif
                            </td>
                            <td class="text-center pt-4">
                                @if ($d->status == 'rejected')
                                    <span class="badge badge-danger p-1" style="font-size:12px;">Di Tolak</span> 
                                @elseif($d->status == 'process')
                                    <span class="badge badge-warning p-1" style="font-size:12px;">Menunggu</span> 
                                @elseif($d->status == 'received')
                                <span class="badge badge-success p-1" style="font-size:12px;">Di Terima</span> 
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('siswa-edit', $d->id)}}" class="btn btn-outline-success btn-icon rounded-circle mr-1"><div><i class="icon ion-compose" style="font-size:23px;"></i></div></a>
                                <a href="{{route('siswa-delete', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a>
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('siswa-detail', $d->id)}}" class="btn btn-purple btn-with-icon">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-info-circle" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Detail</span>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>
    </div>
    

@endsection


@push('footer-admin')
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