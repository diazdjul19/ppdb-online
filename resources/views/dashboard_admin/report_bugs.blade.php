@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <span class="breadcrumb-item active">Report Bugs</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-chatbubble-working" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Report Bugs</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action Report Bugs
            </div><!-- col-4 -->
        </div>
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-sm">
            <table id="table_id" class="table display responsive" >
                <thead class="thead-colored thead-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tanggal Lapor</th>
                        <th class="text-center">Detail</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-4">{{$loop->iteration}}</td>
                            <td class="text-center pt-4">{{$d->subject}}</td>
                            <td class="text-center pt-4">{{$d->name}}</td>
                            <td class="text-center pt-4">{{$d->email}}</td>
                            <td class="text-center pt-4">
                                @if ($d->status == 'not complete')
                                    <span class="badge badge-warning" style="font-size:12px;">Belum Tuntas</span> 
                                @elseif($d->status == 'spam')
                                    <span class="badge badge-danger" style="font-size:12px;">Spam</span>
                                @elseif($d->status == 'complete')
                                    <span class="badge badge-success" style="font-size:12px;">Tuntas</span> 
                                @endif
                            </td>
                            <td class="text-center pt-4">{{date('d M Y | H:i', strtotime($d->created_at))}}</td>
                            
                            <td class="text-center pt-3">
                                <a href="{{route('report-bugs-admin.show', $d->id)}}" class="btn btn-purple btn-with-icon">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-info-circle" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Detail</span>
                                    </div>
                                </a>
                            </td>

                            <td class="text-center pt-3">
                                <a href="{{route('report-bugs-admin.destroy', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a>
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
