@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management Web</a>
            <span class="breadcrumb-item active">MaWeb Hasil Seleksi</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-gear-b" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>MaWeb Hasil Seleksi</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action MaWeb Hasil Seleksi
            </div><!-- col-4 -->

            <a href="{{route('maweb-hasil-seleksi-create')}}" class="btn btn-primary btn-with-icon ml-auto mb-3 mb-sm-0">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="icon ion-calendar" style="font-size:20px;" ></i></span>
                    <span class="pd-x-15">Setting Date & Time</span>
                </div>
            </a>

        </div>
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-sm">
            <table id="table_id" class="table display responsive nowrap" >
                <thead class="thead-colored thead-teal">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Jenis MaWeb</th>
                        <th class="text-center">Dari Tgl</th>
                        <th class="text-center">Sampai Tgl</th>
                        <th class="text-center">Tanggal Create</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-3">{{$loop->iteration}}</td>
                            <td class="text-center pt-3">
                                @if ($d->jenis_maweb == 'maweb_hasil_seleksi')
                                    MaWeb Hasil Seleksi
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <span class="badge badge-success" style="font-size:12px;">
                                    {{date('d M Y  | H:i:s', strtotime($d->dari_tgl))}}
                                </span>
                            </td>
                            <td class="text-center pt-3">
                                <span class="badge badge-danger" style="font-size:12px;">
                                    {{date('d M Y  | H:i:s', strtotime($d->sampai_tgl))}}
                                </span>
                            </td>
                            <td class="text-center pt-3">{{date('d M Y  | H:i:s', strtotime($d->created_at))}}</td>
                            <td class="text-center pt-3">
                                @if ($dt >= $d->sampai_tgl)
                                    <span class="badge badge-danger" style="font-size:12px;">Selesai</span>
                                @elseif ($dt >= $d->dari_tgl)
                                    <span class="badge badge-success" style="font-size:12px;">Berlangsung</span>
                                @endif
                            </td>
                            <td class="text-center pt-2">
                                <a href="{{route('maweb-delete', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a>
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
