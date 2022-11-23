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
        <form action="{{url('/pemeliharaan/add')}}" method="post">
            <div class="modal-body">
                @csrf
                <div class="card p-3 mb-2">
                    <div class="row">
                        <div class="col-md-6  mb-2">
                            <label for="kategori" class="form-label">Nama Aset/ Kategori</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" readonly wire:model="selectPemeliharaan.merek">
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <label for="kodebmn" class="form-label">Kode BMN</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" readonly 
                                name="kode" wire:model="selectPemeliharaan.kode">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="tglperolehan" class="form-label">Tanggal Pelaksanaan</label>
                            <div class="mb-2 input-group has-validation">
                                <input type="date" class="form-control "  data-date-format="DD MMMM YYYY"
                                    required max="{{date('Y-m-d')}}" name="tglPelaksanaan" 
                                    wire:model="selectPemeliharaan.tglPelaksanaan">
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <label for="kodebmn" class="form-label">Pelaksana</label>
                            <div class="input-group has-validation">
                                <input type="text" autocomplete="false" class="form-control 
                                {{ $errors->get('kodebmn') ? 'is-invalid'  : ''}}" name="pelaksana"
                                required wire:model="selectPemeliharaan.pelaksana">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="ket" class="form-label">Kondisi</label>
                            <textarea class="form-control" rows="3" name="kondisi" wire:model="selectPemeliharaan.kondisi"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="ket" class="form-label">Tindakan</label>
                            <textarea class="form-control" rows="3" name="tindakan" wire:model="selectPemeliharaan.tindakan"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
        </div>    

    </div>
</div>

{{-- @endsection --}}
