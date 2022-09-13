@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Detail Barang Keluar
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card mx-3 my-3">
                    <table class=" mx-2 my-3 " width="312px">
                        <tr>
                            <td>Kode </td>
                            <th>{{$trans->kode}}</th>
                        </tr>
                        <tr>
                            <td>Tanggal </td>
                            <th>{{date('d M Y', strtotime($trans->tanggal_trans))}}</th>
                        </tr>
                        <tr>
                            <td>Nama User </td>
                            <th>{{$trans->user_fk}}</th>
                        </tr>
                    </table>
                    <hr>

                    <div class="card mx-2 mb-2">

                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Satuan</th>
                            </thead>
                            @foreach ($detail as $no => $items)
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$items->namabarang}}</td>
                                <td>{{$items->quantity}}</td>
                                <td>{{$items->namasatuan}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <hr>
                    <div class="action d-grid gap-2 d-md-flex justify-content-md-end px-3">
                        <a href='{{url("report/out-detail/{$trans->kode}")}}' target="_blank" class="btn btn-primary me-md-2"><i class="bi bi-printer"></i> Print</a>
                        <a class='btn btn-outline-warning' href='{{url("barang-keluar/list")}}'><i class="bi bi-x-circle"></i> Close</a>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection