@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
        <div class="row">
            <div class="col-md-6 col-sm-12"><strong>Permintaan Barang</strong></div>
            <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
                <span class="fst-italic fs-6 text-secondary">Dashboard > Data Permintaan Penggunaan
                </span>
            </div>
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
                {{-- @if (Auth::user()->role == 'admin') --}}
                    @livewire('permintaan.lists')
                    {{-- @else
                    @livewire('permintaan-live',['userId'=>$userId]);
                @endif --}}
            </div>
            
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/permintaan.js"></script>
<script src="{{asset('js')}}/main.js"></script>
@endpush