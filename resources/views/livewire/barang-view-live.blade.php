<div>
    <div class="row">
        <div class="col-md-4 ">
            <a href="{{url('barang/list')}}" class="btn btn-success mb-2">tutup</a>
        </div>

        <div class="col-md-4">
            <form>
                <div class="input-group mb-3">
                    <select wire:model='selectLokasi' class="form-select">
                        <option value="">--pilih ruangan--</option>
                        @foreach ($lokasis as $lok)
                            <option value="{{$lok->id}}">{{$lok->nama_lokasi}}</option>
                            {{-- <option value="{{$lok->lokasi_fk}}">{{$lok->nama_lokasi}}</option> --}}

                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        
        <div class="col-md-4 ">
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari merek / kode BMN" aria-label="Search"
                        aria-describedby="button-addon2"  wire:model.debounce.350ms="search">
                    <button class="btn btn-outline-secondary" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Merek</th>
                        <th>Kode</th>
                        <th class="">Lokasi</th>
                        <th class="hide-to-mobile">Kondisi</th>
                        <th class="action" >Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($barangs as $key=>$data)
                        <tr>
                            <td>{{$barangs->firstItem() + $key }}</td>
                            <td>{{$data->merek}}</td>
                            <td>{{$data->kode_item}}</td>
                            <td>{{$data->nama_lokasi}}</td>
                            <td class="hide-to-mobile">{{$data->kondisi == 'b' ? 'Baik' : 'rusak' }}</td>
                            <td>
                                <form action='{{url("barang/delete/{$data->id}/{$data->kode_item}")}}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="edit data" href="/barang/{{$data->id}}"><i
                                            class="bi bi-pencil-fill"></i>
                                    </a> 
                                    {{-- <span class="hide-to-mobile">|</span>
                                    <a class="btn btn-outline-warning"  data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="lihat riwayat penggunaan" href="/barang/riwayat/{{$data->kategori_fk}}"><i class="bi bi-clock-history"></i>
                                    </a>
                                    <span class="hide-to-mobile">|</span>
                                    <a class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="lihat riwayat Pemeliharaan"
                                        href="/pemeliharaan/riwayat/{{$data->kategori_fk}}"><i class="bi bi-clock-history"></i>
                                    </a> --}}
                                    <span class="hide-to-mobile">|</span>
                                    <button type="button" wire:click="openInputModal('{{$data->kode_item}}','{{$data->merek}}')" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="input data pemeliharaan"><i
                                            class="bi bi-tools"></i>
                                    </button> 
                                    <span class="hide-to-mobile">|</span>
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cek Riwayat" aria-expanded="false">
                                        <i class="bi bi-clock-history"></i>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="/barang/riwayat/{{$data->kategori_fk}}">Penggunaan</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><button type="button" class="dropdown-item"  wire:click="openRiwayatPemeliharaan('{{$data->kode_item}}')">Pemeliharaan</button></li>
                                        {{-- <li><a class="dropdown-item" href="/pemeliharaan/riwayat/{{$data->kode_item}}">Pemeliharaan</a></li> --}}
                                      </ul>
                                    {{-- <span class="hide-to-mobile">|</span>
                                
                                    <button class="btn btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button> --}}
                                </form>
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
    @include('pemeliharaan.input')
    @include('pemeliharaan.riwayatById')
</div>
