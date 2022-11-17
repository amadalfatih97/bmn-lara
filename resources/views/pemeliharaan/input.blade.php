{{-- @extends('master')

@section('main') --}}
<div class="modal fade addPemeliharaan" wire:ignore.self role="dialog" aria-hidden="true"
    data-keyboard="false" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Input Pemeliharaan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 mb-md-3">
                    <label class="form-label">Filter Lokasi</label>
                    <select class="form-select  {{ $errors->get('selectLokasi') ? 'is-invalid'  : ''}}"
                        wire:model="selectLokasi" aria-label="Default select example">
                        <option value="" {{$selectLokasi == '' ? 'selected' : '' }}>Pilih Lokasi</option>
                        @foreach ($lokasis as $loc)
                            <option value="{{$loc->id}}" {{$selectLokasi == $loc->id ? 'selected' : '' }}>{{$loc->nama_lokasi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-md-3">
                    <label class="form-label">Filter Aset</label>
                    <select class="form-select  {{ $errors->get('status') ? 'is-invalid'  : ''}}"
                        wire:model="selectKategori" aria-label="Default select example" {{$selectLokasi == '' ? 'disabled' : ''}}>
                        <option value="" selected>Pilih Kategori</option>
                        @foreach ($kategoris as $kat)
                            <option value="AC">AC</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-md-3">
                    <label class="form-label">Merek</label>
                    <input type="text" autocomplete="false" class="form-control" 
                    wire:model.debounce.350ms="searchMerek" {{$selectLokasi == '' ? 'disabled' : ''}}>
                </div>
            </div>
            <div class="mb-3">
                @if ($selectLokasi)
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Nama Aset</th>
                        <th>Kode</th>
                        <th class="action">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($asets as $aset)
                            <tr>
                                <td>{{$aset->id}}</td>
                                <td>{{$aset->kategori_fk}} {{$aset->merek}}</td>
                                <td>{{$aset->kode_item}}</td>
                                <td><button class="btn btn-primary"><i class="bi bi-tools"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <td>data not found! </td>
                            </tr>
                        @endforelse
        
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
        </div>
        </div>    

    </div>
</div>

{{-- @endsection --}}
