@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Peminjaman Aset</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Detail Peminjaman
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
                                <p class="mb-0 text-muted">Waktu Pemakaian:</p>
                                <p> 
                                    {{date('d M Y', strtotime($pinjam->waktu_pakai))}} 
                                    s/d  {{$pinjam->waktu_kembali ? date('d M Y', strtotime($pinjam->waktu_kembali)) : '-- -- ----'}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">Kode: </p>
                                <p> {{$pinjam->kode}}</p>
                            </div>
                        {{-- </div> --}}
                        <div class="col-md-6">
                            <p class="mb-0 text-muted">Nama Peminjam: </p>
                            <p class="text-capitalize">{{$pinjam->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0 text-muted">Status: </p>
                            <span role="button" class="badge text-capitalize
                                {{$pinjam->status == 'pending' ? 'bg-warning' : 
                                ($pinjam->status == 'approved' ? 'bg-info' : 
                                ($pinjam->status == 'applied' ? 'bg-primary' : 'bg-success'))}}">
                                {{$pinjam->status}}
                            </span>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0 text-muted">Keperluan: </p>
                            <div class="card">
                                <div class="card-body text-capitalize p-2">
                                    {{$pinjam->perihal}}
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        @if (Auth::user()->role == 'admin' && $pinjam->status == 'pending')
                            <form action='{{url("permintaan/approve/{$pinjam->kode}")}}' method="post">
                            @method('PUT')
                            @csrf
                        @elseif (Auth::user()->role == 'admin' && $pinjam->status == 'approved')
                            <form action='{{url("permintaan/applied/{$pinjam->kode}")}}' method="post">
                            @method('PUT')
                            @csrf
                        @elseif (Auth::user()->role == 'admin' && $pinjam->status == 'applied')
                            <form action='{{url("permintaan/finished/{$pinjam->kode}")}}' method="post">           
                            @method('PUT')
                            @csrf
                        @endif
                        {{--  --}}
                            <div class="col-md-12 mt-2">
                                <p class="mb-0 text-muted">Keterangan Tambahan</p>
                                <textarea class="form-control bg-light" name="ket" {{Auth::user()->role == 'admin' ? '' : 'readonly'}}
                                    id="exampleFormControlTextarea1" rows="3">{{$pinjam->ket}}</textarea>
                            </div>
                            </div>
                            <hr>
                            <div class=" mx-md-3 mb-md-2">
                                <p class="card-title mx-2"><strong>List Item</strong></p>
                                <table class="table table-striped">
                                    {{-- <thead>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Satuan</th>
                                    </thead> --}}
                                    @foreach ($detail as $no => $items)
                                    <tr>
                                        {{-- <td>{{++$no}}</td> --}}
                                        <td>{{$items->qty}}</td>
                                        <td>{{$items->nama_satuan}}</td>
                                        <td>{{$items->jenis}}</td>
                                        <td>{{$items->nama_barang}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <hr>
                            <div class="action d-grid gap-3 d-md-flex justify-content-md-end px-3">
                                {{--  --}}
                                @if (Auth::user()->role == 'admin')
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    class="btn 
                                        {{$pinjam->status == 'pending' ? 'btn-info' : 
                                        ($pinjam->status == 'approved' ? 'btn-primary' :'btn-success')}}"
                                    title="lanjutkan proses" {{$pinjam->status == 'finish' ? 'disabled' : ''}}>
                                        <i class="bi bi-check2-square"></i>
                                        {{$pinjam->status == 'pending' ? 'Approve' : 
                                        ($pinjam->status == 'approved' ? 'Apply' : 'Finish')}}
                                    </button>
                                @endif
                                {{--  --}}
                                {{-- <a href='{{url("report/out-detail/{$pinjam->kode}")}}' target="_blank" class="btn btn-outline-warning me-md-2"><i class="bi bi-printer"></i> Print</a> --}}
                                <a href='{{url("permintaan/list")}}' class='btn btn-outline-danger' href='{{url("permintaan/list")}}' data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="tutup halaman detail"><i class="bi bi-x-circle"></i> Close</a>
                            </div>

                        </form>
                            
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection