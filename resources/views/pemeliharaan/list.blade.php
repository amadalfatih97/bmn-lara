@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12"><strong>Data Invetory</strong></div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Data Satuan
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-md px-md-4">
        @livewire('pemeliharaan-live')
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/pemeliharaan.js"></script>
@endpush