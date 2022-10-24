@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12"><strong>Monitoring Aset BMN</strong></div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Data Laporan Keluhan
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-md px-md-4">
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-8 ">
                    <!-- <a href="{{url('keluhan/add')}}" class="btn btn-success mb-2">input</a> -->
                </div>
            
                <div class="col-md-4 ">
                    <form action='{{url("keluhan/list")}}' method="GET">
                        <div class="input-group mb-3">
                            <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2" value="{{Request::get('key')}}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session()->get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-auto">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th class="no">No</th>
                                <th>Nama Pegawai</th>
                                <th>Nama Aset</th>
                                <th>Lokasi</th>
                                <th>Tanggal Laporan</th>
                                <th>Status</th>
                                <th class="action" colspan=2>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($keluhans as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->nama_lokasi}}</td>
                                    <td>{{$data->created_at ? date('d M Y', strtotime($data->created_at)) : date('d M Y') }} </td>
                                    <td> <span role="button" class="badge text-capitalize
                                            {{$data->status == '1' ? 'bg-warning' : 'bg-success'}}">
                                            {{$data->status == '1' ? 'pending' : 'received'}}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="/keluhan-detail/{{$data->id}}"><i class="bi bi-info-square"></i></button>
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
