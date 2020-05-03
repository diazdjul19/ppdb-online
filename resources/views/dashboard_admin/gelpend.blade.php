@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <span class="breadcrumb-item active">Gelombang Pendaftaran</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-shuffle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Gelombang Pendaftaran</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action Gelombang Pendaftaran
            </div><!-- col-4 -->


            <a href="{{route('gelpend.create')}}" class="btn btn-info btn-with-icon ml-auto mb-3 mb-sm-0">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="icon ion-shuffle" style="font-size:20px;" ></i></span>
                    <span class="pd-x-15">Create Gelpend</span>
                </div>
            </a>
        </div>
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-sm">
            <table id="table_id" class="table display responsive" >
                <thead class="thead-colored thead-pink">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Gelombang</th>
                        <th class="text-center">Text</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $d)
                    <tr>
                        <td class="wd-5p text-center">{{$loop->iteration}}</td>
                        <td class="wd-15p text-center">{{$d->nama_gelombang}}</td>
                        <td class="wd-45p" align="justify">{!! $d->text_description !!}</td>
                        <td class="wd-10p text-center">
                            <a href="{{route('gelpend.edit', $d->id)}}" class="btn btn-outline-success btn-icon rounded-circle mr-1"><div><i class="icon ion-compose" style="font-size:23px;"></i></div></a>
                            <a href="{{route('gelpend.destroy', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a>
                        </td>
                    </tr>
                @endforeach
                <tbody>
                    
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
