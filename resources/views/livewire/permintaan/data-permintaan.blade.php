<div>
    {{-- <form wire:submit.prevent="save"> --}}
        <form action="{{ route('permintaan.store') }}" method="POST">
            @csrf
            {{-- start add item --}}
            <div class="mb-3">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="jadwalpakai" class="form-label">Jadwal Pakai</label>
                            <input type="text" id="picker-start" name="jadwalpakai" wire:model="jadwalpakai" autocomplete="off"
                                value="{{old('jadwalpakai')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="jadwallkembali" class="form-label">Jadwal Pengembalian</label>
                            <input type="text" id="picker-end" name="jadwalkembali" wire:model="jadwalkembali" autocomplete="off"
                                value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input type="text" name="keperluan" wire:model="keperluan" required class="form-control text-capitalize">
            </div>
            <div class="form-group mb-3">
                <label for="ket" class="form-label">Catatan</label>
                <textarea name="ket" required class="form-control text-capitalize" > </textarea>
            </div>
            {{-- <button type="button" disabled class="btn btn-primary" id="add">Tambah</button> --}}
            <button type="button" class="btn btn-primary" wire:click.prevent="addProduct"
            data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Data Request Peminjaman" >Tambah</button>
            <a type="button" class='btn btn-warning ml-3' href='{{url("permintaan/list")}}'
            data-bs-toggle="tooltip" data-bs-placement="right" title="ke halamam sebelumnya" >Batal</a>
            {{-- end add item --}}
        
            <div class="my-3" id=" show-items">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Aset</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestAsets as $index => $requestAset)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                <input type="hidden"
                                    name="requestAsets[{{$index}}][productid]"
                                    wire:model="requestAsets.{{$index}}.productid"/>
                                <input type="text" readonly style="border:none; width:-webkit-fill-available;"
                                    name="requestAsets[{{$index}}][nameitem]"
                                    wire:model="requestAsets.{{$index}}.nameitem"/>
                            </td>
                            <td><a type="button" class="btn btn-outline-danger btn-sm" wire:click.prevent="removeItem({{$index}})"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="hapus dari list" ><i class="bi bi-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    @if (count($requestAsets) <= 0)
                        <tbody id="rowitem">
                            <tr>
                                <th colspan="4">Item Kosong</th>
                            </tr>
                            
                        </tbody>
                    @endif
                </table>
            </div>
            
            <button type="submit" 
            class='btn btn-success ml-3' id='submit' {{count($requestAsets) <= 0 ? 'disabled' : ''}} >Submit</button>
            {{-- <button type="button" class='btn btn-danger ml-3' id="clear-storage">Clear</button> --}}
        </form>
        
        @include('livewire.permintaan.modal.find-modal')
        @include('livewire.permintaan.modal.detail-aset')
    
    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
        <div class="toast align-items-center text-bg-primary border-2" role="alert" 
        data-bs-delay="1000" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Aset berhasil ditambahkan!
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
