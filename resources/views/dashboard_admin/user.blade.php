@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management User</a>
            <span class="breadcrumb-item active">Management User</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users-cog" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management User</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, voluptate optio.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
        <div class="d-sm-flex align-items-center mb-4">
                
            <div class="mg-t-20 mg-lg-t-0">
                Action Management User
            </div><!-- col-4 -->


            <a href="{{route('user.create')}}" class="btn btn-info btn-with-icon ml-auto mb-3 mb-sm-0">
                <div class="ht-40">
                    <span class="icon wd-40"><i class="icon ion-person-add" style="font-size:20px;" ></i></span>
                    <span class="pd-x-15">Create User</span>
                </div>
            </a>
        </div>
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-sm">
            <table id="table_id" class="table display responsive nowrap" >
                <thead class="thead-colored thead-indigo">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-4">{{$loop->iteration}}</td>
                            {{-- <td class="text-center pt-4"></td> --}}
                            <td class="text-center">
                                @if ($d->foto_user == true)
                                    {{-- Mengambil Image dari storage bawaan laravel --}}
                                    {{-- <img style="width: 50px; height:50px;border-radius:50%;" src="{{url('/storage/user/'.$d->foto_user)}}"> --}}

                                    {{-- Mengambil Image dari storage cloudinary --}}
                                    <img style="width: 50px; height:50px;border-radius:50%;" src="{{$d->foto_user}}">
                                @elseif ($d->foto_user == false)
                                    <img src="/image-tambahan/user-polos.png" style="width: 50px; height:50px;border-radius:50%;" alt="">
                                @endif

                            </td>
                            <td class="text-center pt-4">{{$d->name}}</td>
                            <td class="text-center pt-4">{{$d->email}}</td>
                            <td class="text-center pt-4">
                                @if ($d->level == 'A')
                                    <span class="badge badge-primary" style="font-size:12px;">Admin</span> 
                                @elseif($d->level == 'O')
                                    <span class="badge badge-info" style="font-size:12px;">Operator</span> 
                                @endif
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('user.edit', $d->id)}}" class="btn btn-outline-success btn-icon rounded-circle mr-1"><div><i class="icon ion-compose" style="font-size:23px;"></i></div></a>
                                <a href="{{route('user.destroy', $d->id)}}" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a>
                            </td>
                            <td class="text-center pt-3">
                                <a href="{{route('user.show', $d->id)}}" class="btn btn-purple btn-with-icon">
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
