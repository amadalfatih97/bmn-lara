@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Detail Keluhan Aset</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Detail Keluhan
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container">
        @if(session()->get('success'))
        <div class="mx-md-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session()->get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 ">
                <div class="card mx-md-3 py-3">
                    <div class="row px-3 ">
                        {{-- <div class="d-flex justify-content-between"> --}}
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">Waktu Laporan:</p>
                                <p> 
                                    {{$keluhan->created_at ? date('d M Y', strtotime($keluhan->created_at)) : '-'}} 
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">Lokasi: </p>
                                <p> {{$keluhan->nama_lokasi}}</p>
                            </div>
                        {{-- </div> --}}
                        <div class="col-md-6">
                            <p class="mb-0 text-muted">Nama Pegawai: </p>
                            <p class="text-capitalize">{{$keluhan->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0 text-muted">Status: </p>
                            <span role="button" class="badge text-capitalize
                                {{$keluhan->status == '1' ? 'bg-warning' : 'bg-success'}}">
                                {{$keluhan->status == '1' ? 'pending' : 'received'}}
                            </span>
                        </div>
                        <form action='{{url("keluhan/accept/{$keluhan->id}")}}' method="post">
                            @method('PUT')
                            @csrf
                            <div class="col-md-12 mt-2">
                                <p class="mb-0 text-muted">Detail Aset</p>
                                <div class="card p-2 text-capitalize">{{$keluhan->jenis}} {{$keluhan->nama_barang}} - {{$keluhan->kode}} </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p class="mb-0 text-muted">Deskripsi Keluhan</p>
                                <textarea class="form-control bg-light" name="ket" 
                                    rows="3" readonly>{{$keluhan->ket}} </textarea>
                            </div>
                            <hr>
                            <div class="action d-grid gap-3 d-md-flex justify-content-md-end px-3">
                                {{--  --}}
                                @if (Auth::user()->role == 'admin')
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    class="btn {{$keluhan->status == '1' ? 'btn-info' : 'btn-success'}}"
                                    title="terima laporan" {{$keluhan->status == '2' ? 'disabled' : ''}}>
                                        <i class="bi bi-check2-square"></i>
                                        {{$keluhan->status == '1' ? 'accept' : 'Done'}}
                                    </button>
                                @endif
                                {{--  --}}
                                <a href='{{url("keluhan/list")}}' class='btn btn-outline-danger' data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="tutup halaman detail"><i class="bi bi-x-circle"></i> Close</a>
                            </div>

                        </form>
                            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection