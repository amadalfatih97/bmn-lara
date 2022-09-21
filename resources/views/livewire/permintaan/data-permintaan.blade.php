<div>
    {{-- <form wire:submit.prevent="save"> --}}
        <form action="{{ route('permintaan.store') }}" method="POST">
            @csrf
            {{-- start add item --}}
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="jadwalpakai" class="form-label">Jadwal Pakai</label>
                            <input type="text" id="picker" name="jadwalpakai"
                                value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="jadwallkembali" class="form-label">Jadwal Pengembalian</label>
                            <input type="text" id="picker" name="jadwalkembali" wire:model="jadwalkembali"
                                value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <textarea name="keperluan" wire:model="keperluan" class="form-control text-capitalize"> </textarea>
            </div>
            {{-- <button type="button" disabled class="btn btn-primary" id="add">Tambah</button> --}}
            <button type="button" class="btn btn-primary" wire:click.prevent="addProduct"
            data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Data Request Peminjaman" >Tambah</button>
            <button type="button" class='btn btn-warning ml-3'
            data-bs-toggle="tooltip" data-bs-placement="right" title="ke halamam sebelumnya" >Cancel</button>
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
                                    class="form-control"
                                    name="requestAsets[{{$index}}][productid]"
                                    wire:model="requestAsets.{{$index}}.productid"/>
                                <input type="text" readonly style="border:none;"
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
            class='btn btn-success ml-3' id='submit' >Submit</button>
            {{-- <button type="button" class='btn btn-danger ml-3' id="clear-storage">Clear</button> --}}
        </form>

        
    @include('livewire.permintaan.modal.find-modal')
    @include('livewire.permintaan.modal.detail-aset')
</div>
