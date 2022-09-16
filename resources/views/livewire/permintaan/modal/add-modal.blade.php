<div class="modal fade addModal" role="dialog" wire:ignore.self tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Request Peminjaman</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div> 
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                                {{-- <form wire:submit.prevent="save"> --}}
                                <form action="{{ route('permintaan.store') }}" method="POST">
                                    @csrf
                                    {{-- start add item --}}
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                                    <input type="text" id="picker" name="tanggalkeluar" wire:model="tglkeluar"
                                                        value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                                    <input type="text" id="picker" name="tanggalkeluar" wire:model="tglkeluar"
                                                        value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="ket" class="form-label">Keperluan</label>
                                        <textarea wire:model="ket" class="form-control text-capitalize"> </textarea>
                                    </div>
                                    {{-- <button type="button" disabled class="btn btn-primary" id="add">Tambah</button> --}}
                                    <button type="button" class="btn btn-primary" wire:click.prevent="addProduct">Tambah</button>
                                    <button type="button" class='btn btn-warning ml-3' data-bs-dismiss="modal" >Cancel</button>
                                    {{-- end add item --}}
                                   
                                    <div class="my-3" id=" show-items">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                @foreach ($orderProducts as $index => $orderProduct)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td>
                                                        <input type="hidden"
                                                            class="form-control"
                                                            name="orderProducts[{{$index}}][product_id]"
                                                            wire:model="orderProducts.{{$index}}.product_id"/>
                                                        <input type="text"
                                                            class="form-control"
                                                            name="orderProducts[{{$index}}][namabrg]"
                                                            wire:model="orderProducts.{{$index}}.namabrg"/>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control"
                                                            name="orderProducts[{{$index}}][quantity]"
                                                            wire:model="orderProducts.{{$index}}.quantity" />
                                                    </td>
                                                    <td><a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            @if (count($orderProducts) <= 0) --}}
                                                <tbody id="rowitem">
                                                    <tr>
                                                        <th colspan="4">Item Kosong</th>
                                                    </tr>
                                                    
                                                </tbody>
                                            {{-- @endif --}}
                                        </table>
                                    </div>
                                    <button type="submit" 
                                    class='btn btn-success ml-3' id='submit' {{count($orderProducts) <= 0 ? 'disabled' : ''}}>Submit</button>
                                    {{-- <button type="button" class='btn btn-danger ml-3' id="clear-storage">Clear</button> --}}
                                </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>