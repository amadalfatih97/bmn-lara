@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Aset BMN</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > Pemeliharaan Aset
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                    <h4 style="margin: 0">Riwayat Pemeliharaan  Aset [{{$riwayat->count() > 0 ? $riwayat[0]->nama_barang : ''}}]</h4>
                    <a href='{{url("barang/list")}}' class="btn btn-warning me-2 ">kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-hover">
                        <thead>
                            <th class="no">No</th>
                            <th>Tanggal</th>
                            <th>Serial/Kode Aset</th>
                            <th>Keluhan</th>
                            <th>Tindakan</th>
                            <th>Catatan</th>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $key=>$data)
                            <tr>
                                <td>{{ $key+1  }}</td>
                                <td>{{date('d M Y', strtotime($data->waktu_pelaksanaan))}} </td>
                                <td><a href="/pemeliharaan/{{$data->id}}">{{$data->kode}}</a></td>
                                <td>{{$data->keluhan ? $data->keluhan : '-'}}</td>
                                <td>{{$data->tindak_lanjut}} </td>
                                <td>{{$data->ket}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6"><h3 class="text-secondary">data not found!</h3></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
