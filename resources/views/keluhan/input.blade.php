@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Monitoring BMN</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > Laporan Keluhan
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        <?php
            $getBarang = '';
        ?>
        @if ($errors->any())
        <?php
            $getBarang = old('aset');
        ?>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session()->get('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">

                    <form action="{{url('/keluhan/add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select class="form-select  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                name="lokasi" aria-label="Default select example" required id="selectloc">
                                <option value="">Pilih Lokasi Aset</option>
                                @foreach ($lokasis as $loc)
                                <option value="{{$loc->id}}" >
                                    {{$loc->nama_lokasi}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Aset</label>
                            <select class="form-select  {{ $errors->get('kategori') ? 'is-invalid'  : ''}}"
                                name="kategori" aria-label="Default select example" required id="selectname" disabled>
                                <option value="">Pilih Aset</option>
                                {{-- @foreach ($barangs as $item)
                                <option value="{{$item->merek}}" {{$item->kode_item == $getBarang ? 'selected' : ''}}>
                                    {{$item->merek}}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode / Merek</label>
                            <select class="form-select  {{ $errors->get('kode') ? 'is-invalid'  : ''}}"
                                name="kode" aria-label="Default select example" required id="selectkode" disabled>
                                <option value="">--Pilih Kode--</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi Keluhan/ Kerusakan:</label>
                            <div class="mb-3 input-group has-validation">
                                <textarea type="text" value="{{old('desc')}}" class="form-control 
                                {{ $errors->get('desc') ? 'is-invalid'  : ''}}" 
                                    name="desc" required> </textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/pemeliharaan.js"></script>
@endpush