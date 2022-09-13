@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        
        <h6 class="mb-0">Permintaan Barang</h6>
    </div>
</div>
<div class="pt-3">
    <div class="container-md px-md-4">
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                @livewire('permintaan-live')
            </div>
            
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/permintaan.js"></script>
<script src="{{asset('js')}}/main.js"></script>
@endpush