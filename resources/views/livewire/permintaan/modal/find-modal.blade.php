<div class="modal fade findModal" role="dialog" wire:ignore.self tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h6 class="modal-title">Temukan Aset</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div> 
            <div class="modal-body">
                <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                    <div class="toast align-items-center text-bg-primary border-0" role="alert" 
                    data-bs-delay="5000" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                aset berhasil ditambahkan!
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            
                                    <div class="input-group mb-3">
                                        <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                                            aria-describedby="button-addon2" wire:model="search" >
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangs as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>
                                                {{$item->nama_barang}}
                                            </td>
                                            <td>
                                                {{$item->status == 'true' ? 'Sedia' : 'Tidak Tersedia'}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" {{$item->status == 'false' ? 'disabled' : ''}} wire:click.prevent="onAdding({{$item->kode}}, '{{$item->nama_barang}}')" 
                                                data-bs-toggle="tooltip" data-bs-placement="left" title="request aset ini" >
                                                    <i class="bi bi-download"></i>
                                                </button> |
                                                <button type="button" class="btn btn-outline-primary btn-sm" wire:click.prevent="detailAset"
                                                data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat Detail" >
                                                    <i class="bi bi-info-lg"></i>
                                                </button> 
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
    </div>
</div>
