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
                                            <td>1</td>
                                            <td>
                                                {{$item->nama_barang}}
                                            </td>
                                            <td>
                                                seadia
                                            </td>
                                            {{-- <td><a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a></td> --}}
                                            
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent=""><i class="bi bi-info-lg"></i></button> |
                                                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="detailAset"><i class="bi bi-download"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{-- @if (count($orderProducts) <= 0) --}}
                                        {{-- <tbody id="rowitem">
                                            <tr>
                                                <th colspan="4">Item Kosong</th>
                                            </tr>
                                            
                                        </tbody> --}}
                                    {{-- @endif --}}
                                </table>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
