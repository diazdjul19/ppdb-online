@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <span class="breadcrumb-item active">Management Siswa Process</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-user-clock" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Siswa Process</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    

    {{-- br-body --}}
    <div class="br-pagebody">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-success">{{$message}}</h5>
                    <p class="mg-b-0 tx-gray">Silahkan login menggunakan NISN dan Password yang telah anda buat.</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        @if ($message = Session::get('pass_true'))
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-danger">Error: Cannot process your entry!</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action Management Siswa Process
            </div><!-- col-4 -->


            <a href="{{route('siswa-process-create-siswa')}}" class="btn btn-info btn-with-icon ml-auto mb-3 mb-sm-0">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="icon ion-person-add" style="font-size:20px;" ></i></span>
                    <span class="pd-x-15">Create Siswa</span>
                </div>
            </a>
        </div>
        
        <hr>
        <hr>
        <br>

        <form action="{{route('select-delete-process')}}" method="post">
            @csrf
            <div class="table-wrapper table-responsive-sm">
                <table id="table_id" class="table display responsive nowrap" >
                    <thead class="thead-colored thead-primary">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                            {{-- <th class="text-center">Detail</th> --}}
                            <th class="text-center">
                                <div>
                                    <button class="btn btn-danger btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Yang Di Pilih?');">
                                        <i class="icon ion-trash-b p-2"></i>
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td class="text-center pt-4">{{$loop->iteration}}</td>
                                <td class="text-center pt-4">{{$d->nama_calon_siswa}}</td>
                                <td class="text-center pt-4">{{$d->nisn}}</td>
                                <td class="text-center pt-4" style="font-weight:bold;">{{$d->data_sekolah_nilai->rata_nilai}}</td>
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
                                    {{-- <a href="{{route('siswa-delete', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a> --}}
                                    <a href="{{route('siswa-detail', $d->id)}}" class="btn btn-outline-purple btn-icon rounded-circle ml-1"><div><i class="fas fa-info-circle" style="font-size:23px;"></i></div></a>
                                </td>
                                {{-- <td class="text-center pt-3">
                                    <a href="{{route('siswa-detail', $d->id)}}" class="btn btn-purple btn-with-icon">
                                        <div class="ht-40">
                                            <span class="icon wd-30"><i class="fas fa-info-circle" style="font-size:20px;"></i></span>
                                            <span class="pd-x-15">Detail</span>
                                        </div>
                                    </a>
                                </td> --}}
                                <td class="text-center pt-4"><input type="checkbox" name="select_delete[]" value="{{$d->id}}"></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </form>    
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
