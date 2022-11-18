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
            <div class="input-group">
                <input type="text" class="text-input">
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
