<div>
    <div class="card px-3 py-3">
        <div class="row">
            <div class="col-md-8 ">
                <button wire:click="openInputModal()" class="btn btn-success mb-2">input</button>
            </div>
        
            <div class="col-md-4 ">
                <div class="input-group mb-3">
                    <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2"  wire:model.debounce.350ms="keyword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
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
                            <th>Nama Aset</th>
                            <th>No BMN</th>
                            <th>Tanggal</th>
                            <th>Pelaksana</th>
                            <th class="action" colspan=2>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                        @foreach($datas as $key=>$data)
                        <tr>
                            <td>{{$datas->firstItem() + $key  }}</td>
                            <td>{{$data->kategori_fk}} {{$data->merek}}</td>
                            <td>{{$data->kode_item}}</td>
                            <td>{{$data->tgl_pemeliharaan}}</td>
                            <td>{{$data->pelaksana}}</td>
                            <td>
                                <a class="btn btn-outline-primary"  data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="lihat daftar" href="/barang/view/{{$data->kategori_fk}}"><i class="bi bi-list"></i></a>
                                
                            </td>
                        </tr>
                        @endforeach
            
                        </tbody>
                    </table>
                    @if (count($datas))
                        {{$datas->links('livewire/paginate-live')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('pemeliharaan.input')
</div>
