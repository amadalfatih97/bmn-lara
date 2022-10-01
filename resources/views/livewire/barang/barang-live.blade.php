<div>
    
    <div class="row">
        <div class="col-md-8 ">
            <a href="{{url('barang/add')}}" class="btn btn-success mb-2">input</a>
        </div>
    
        <div class="col-md-4 ">
            <form >
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2" wire:model.debounce.350ms="keyword">
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
                        <th class="hide-to-mobile">Lokasi</th>
                        <th class="hide-to-mobile">Kondisi</th>
                        <th>Status</th>
                        <th class="action" colspan=2>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($barangs as $key=>$data)
                        <tr>
                            <td>{{$barangs->firstItem() + $key  }}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>{{$data->kode}}</td>
                            {{-- <td>{{$data->nama_satuan}}</td> --}}
                            <td class="hide-to-mobile">{{$data->nama_lokasi}}</td>
                            <td class="hide-to-mobile">{{$data->kondisi == 'b' ? 'baik' : ($data->kondisi == 'rr' ? 'rusak ringan' : 'rusak berat')}}</td>
                            <td>{{$data->status == 'true' ? 'tersedia' : 'tidak tersedia'}}</td>
                            <td>
                                <a class="btn btn-outline-primary"  data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="edit data" href="/barang/{{$data->id}}"><i class="bi bi-pencil-square"></i></a>
                                <span class="hide-to-mobile">|</span>
                                    {{-- <form > --}}
                                        {{-- @csrf --}}
                                        {{-- @method('DELETE') --}}
                                        <button class="btn btn-outline-danger"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="hapus data" 
                                        wire:click="confirmDelete({{$data->id}},'Delete','kamu yakin akan menghapus barang ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    {{-- </form> --}}
                                <span class="hide-to-mobile">|</span>
                                <a class="btn btn-outline-warning"  data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="lihat riwayat" href="/barang/riwayat/{{$data->kode}}"><i class="bi bi-clock-history"></i></a>
                            </td>
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
                @if (count($barangs))
                    {{$barangs->links('livewire/paginate-live')}}
                @endif
            </div>
        </div>
    </div>
</div>
