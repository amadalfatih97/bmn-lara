@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > data
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        
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
                    <form action="/satuan/update/{{$satuan->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_satuan" class="form-label">Edit Nama Satuan</label>
                            <input value="{{old('nama_satuan',$satuan->nama_satuan)}}" type="text" class="form-control" id="exampleInputSatuan"
                                name="nama_satuan">
                            <div class="form-text">Silahkan Input Satuan</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("setting/satuan/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
