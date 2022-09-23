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
        <div class="row">
            <div class="col-md-12 ">
                <div class="card mx-md-3 py-3">
                    <div class="row px-3 ">
                        {{-- <div class="d-flex justify-content-between"> --}}
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">Waktu Pemakaian:</p>
                                <p> 
                                    {{date('d M Y', strtotime($pinjam->waktu_pakai))}} 
                                    s/d  {{date('d M Y', strtotime($pinjam->waktu_kembali))}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">Kode: </p>
                                <p> {{$pinjam->kode}}</p>
                            </div>
                        {{-- </div> --}}
                        <div class="col-md-12">
                            <p class="mb-0 text-muted">Nama Peminjam: </p>
                            <p class="text-capitalize">{{$pinjam->name}}</p>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0 text-muted">Keperluan: </p>
                            <div class="card">
                                <div class="card-body text-capitalize">
                                    {{$pinjam->perihal}}
                                </div>
                              </div>
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
                                <td>1</td>
                                <td>{{$items->nama_satuan}}</td>
                                <td>{{$items->nama_barang}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <hr>
                    <div class="action d-grid gap-3 d-md-flex justify-content-md-end px-3">
                        <form action='{{url("permintaan/approve/{$pinjam->kode}")}}' method="post">
                            @csrf
                            @method('PUT')
                            <button class='btn btn-success' style="width: -webkit-fill-available">
                                <i class="bi bi-check2-square"></i> Approve
                            </button>
                        </form>
                        <a href='{{url("report/out-detail/{$pinjam->kode}")}}' target="_blank" class="btn btn-outline-primary me-md-2"><i class="bi bi-printer"></i> Print</a>
                        <a href='{{url("permintaan/list")}}' class='btn btn-outline-warning' href='{{url("permintaan/list")}}'><i class="bi bi-x-circle"></i> Close</a>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection