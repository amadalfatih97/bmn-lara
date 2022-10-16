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
                            <label for="sarana" class="form-label">Aset</label>
                            <select class="form-select  {{ $errors->get('sarana') ? 'is-invalid'  : ''}}"
                                name="sarana" aria-label="Default select example" required id="selectname">
                                <option value="">Pilih Aset</option>
                                @foreach ($barangs as $item)
                                <option value="{{$item->nama_barang}}" {{$item->kode == $getBarang ? 'selected' : ''}}>
                                    {{$item->nama_barang}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="kode" class="form-label">Serialnumber/ Kode</label>
                            <div class="mb-3 input-group has-validation">
                                <input type="text" value="{{old('kode')}}" class="form-control 
                                {{ $errors->get('kode') ? 'is-invalid'  : ''}}" 
                                    name="kode" required>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label for="kode" class="form-label">Serial / Kode Aset</label>
                            <select class="form-select  {{ $errors->get('kode') ? 'is-invalid'  : ''}}"
                                name="kode" aria-label="Default select example" required id="selectsernum">
                                <option value="">Pilih Serial...</option>

                                {{-- @foreach ($barangs as $item) --}}
                                {{-- <option value="{{$item->kode}}" {{$item->kode == $getBarang ? 'selected' : ''}}> --}}
                                    {{-- {{$item->nama_barang}} --}}
                                {{-- </option> --}}
                                {{-- @endforeach --}}
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