<div>
    <div class="row">
        <div class="col-md-8 ">
            <a href="{{url('pemeliharaan/add')}}" class="btn btn-success mb-2">input</a>
        </div>
    
        <div class="col-md-4 ">
            <form action='{{url("pemeliharaan/list")}}' method="GET">
                <div class="input-group mb-3">
                    <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2"  wire:model.debounce.350ms="keyword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Tanggal</th>
                        <th>Aset</th>
                        <th>Hasil</th>
                        <th>Tindak Lanjut</th>
                        <th class="action" colspan=2>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($pemeliharaans as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{date('d M Y', strtotime($data->waktu_pelaksanaan))}}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>{{$data->hasil}}</td>
                            <td>{{$data->tindak_lanjut}}</td>
                            <td>
                                <form action='{{url("pemeliharaan/delete/{$data->id}")}}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-outline-primary" href="/pemeliharaan/{{$data->id}}"><i class="bi bi-info"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat detail"></i></a>
                                |
                                    <button class="btn btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
