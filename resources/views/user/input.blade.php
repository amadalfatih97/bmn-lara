@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > Data User
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">

    <?php
        $getRole ='';
        $getUnit ='';
        ?>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">

                    <form action="{{url('/user/add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Input Nama User</label>
                            <input type="text" value="{{old('nama')}}" class="form-control"
                                name="nama" autocomplete="off" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{old('username')}}" class="form-control"
                                name="username" autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" value="{{old('password')}}" class="form-control"
                                name="password" autocomplete="off" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-select  {{ $errors->get('unit') ? 'is-invalid'  : ''}}"
                                name="unit" aria-label="Default select example" required>
                                <option>Pilih Unit</option>
                                <option value="tu" {{$getUnit == 'tu' ? 'selected' : ''}}>Tata Usaha</option>
                                <option value="pd" {{$getUnit == 'pd' ? 'selected' : ''}}>Pelaksana Diklat</option>
                                <option value="pkd" {{$getUnit == 'pkd' ? 'selected' : ''}}>Pengembangan Diklat</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select  {{ $errors->get('role') ? 'is-invalid'  : ''}}"
                                name="role" aria-label="Default select example" required>
                                <option value="">Pilih role</option>
                                <option value="admin" {{$getRole == 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="pegawai" {{$getRole == 'pegawai' ? 'selected' : ''}}>Pegawai</option>
                                <!-- <option value="rb" {{$getRole == 'pkd' ? 'selected' : ''}}>Pengembangan Diklat</option> -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("user/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
