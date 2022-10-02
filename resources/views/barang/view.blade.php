@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12"><strong>Data Invetory</strong></div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Data Barang
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-md px-md-4">
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-8 ">
                    <a href="{{url('barang/list')}}" class="btn btn-warning mb-2">tutup</a>
                </div>

                <div class="col-md-4 ">
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2" >
                            <button class="btn btn-outline-secondary" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-auto">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th class="no">No</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th class="">Lokasi</th>
                                <th class="hide-to-mobile">Kondisi</th>
                                <th class="hide-to-mobile">Ket</th>
                                <th class="action" colspan=3>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($barangs as $key=>$data)
                                <tr>
                                    <td>{{$no++ }}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->kode}}</td>
                                    <td>{{$data->nama_lokasi}}</td>
                                    <td class="hide-to-mobile">{{$data->kondisi == 'b' ? 'Baik' : 'rusak' }}</td>
                                    <td class="hide-to-mobile">{{$data->ket ? $data->ket : '-'}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="edit data" href="/barang/{{$data->id}}"><i
                                                class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td>
                                        <span class="hide-to-mobile">|</span>
                                    </td>
                                    <td>
                                        <form action='{{url("barang/delete/{$data->id}/{$data->nama_barang}")}}' method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <!-- <span class="hide-to-mobile">|</span>
                                        <a class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="lihat riwayat"
                                            href='{{url("/barang/riwayat/{$data->kode}")}}'><i
                                                class="bi bi-clock-history"></i></a> -->
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/main.js"></script>
@endpush
