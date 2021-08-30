@extends('layouts.master-admin-ppdb')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">PPDB Online</a>
            <a class="breadcrumb-item" href="#">Management User</a>
            <a class="breadcrumb-item" href="{{route('user.index')}}">Management User</a>
            <span class="breadcrumb-item active">Edit User</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit User</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="row justify-content-center">
        <div class="col-12 grid-margin">
                <div class="d-md-flex align-items-center mb-4">
                    <a href="{{route('user.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                    </a>
                    <h3 class="card-title mb-md-0">Form Edit Data</h3>

                </div>
                <br>                
                <form class="form-sample" action="{{route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nama User</label>                                    
                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{$data->name}}" required autocomplete="name" placeholder="Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Email User </label>
                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}  {{$data->email}}" required autocomplete="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="exampleInputEmail1">Password</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  autocomplete="new-password" placeholder="Password Baru">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                                        </div>
                                    </div>
                                    @if ($message = Session::get('gagal'))
                                        <strong style="color:red;">{{ $message }}</strong>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="exampleInputEmail1">Password Confirmation</label>                                
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password Baru">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                                        </div>
                                    </div>
                                    @if ($message = Session::get('gagal'))
                                        <strong style="color:red;">{{ $message }}</strong>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Tempat Lahir</label>                                    
                                    <div class="col-md-9">
                                        <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1"  placeholder="Tempat Lahir" required value="{{$data->tempat_lahir}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Tanggal Lahir </label>
                                    <div class="col-md-9">
                                        <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal_lahir" required value="{{$data->tanggal_lahir}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Jenis Kelamin</label>                                    
                                    <div class="col-md-9">
                                        <select class="form-control" name="jenis_kelamin" placeholder="Gender" required>
                                            <optgroup label="Gender Lama">
                                                <option  value="{{$data->jenis_kelamin}}">
                                                    @if ($data->jenis_kelamin == 'laki-laki')
                                                        <span>Laki-laki</span>
                                                    @elseif($data->jenis_kelamin == 'perempuan')
                                                        <span>Perempuan</span>    
                                                    @endif
                                                </option>
                                            </optgroup>  
                                            <optgroup label="Gender Baru">  
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Nomer HP</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1"  placeholder="Nomer Hand Phone" required value="{{$data->no_hp}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Level User</label>                                    
                                <div class="col-md-9">
                                    <select class="form-control" name="level" placeholder="Level" required>
                                        <optgroup label="Lavel Lama">
                                            <option  value="{{$data->level}}">
                                                @if ($data->level == 'A')
                                                    <span>Admin</span>
                                                @elseif($data->level == 'O')
                                                    <span>Operator</span>    
                                                @endif
                                            </option>
                                        </optgroup>  
                                        <optgroup label="Level Baru">  
                                            <option value="A">Admin</option>
                                            <option value="O">Operator</option>
                                        </optgroup>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-md-3 col-form-label" for="exampleInputEmail1">Foto User</label>                                   
                                <div class="col-md-9">
                                    @if($data->foto_user)
                                        {{-- MENGAMBIL IMAGE DARI STORAGE BAWAAN LARAVEL --}}
                                        {{-- <img src="{{url('/storage/user/'.$data->foto_user)}}" width="120px"> --}}

                                        {{-- MENGAMBIL IMAGE DARI STORAGE CLOUDINARY --}}
                                        <img src="{{$data->foto_user}}" width="120px">

                                    @endif
                            
                                    <input type="file" name="foto_user" class="form-control" id="exampleInputEmail1"  placeholder="User Photo" value="{{$data->foto_user}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                            <div class="ht-40">
                                <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                <span class="pd-x-15">Simpan</span>
                            </div>
                        </button>
                </form>
        </div>
    </div>
        </div>
    </div>
@endsection

@push('footer-admin')
    <script>
        var state= false;
        function toggle1() {
            if (state) {
                document.getElementById(
                    "password").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye1").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye1").style.color='#5887ef';
                state = true;
            }
        }

        function toggle2() {
            if (state) {
                document.getElementById(
                    "password-confirm").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye2").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password-confirm").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye2").style.color='#5887ef';
                state = true;
            }
        }
    </script>
@endpush