@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Monitoring BMN</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > Input Data Pemeliharaan
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
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">

                    <form action="{{url('/pemeliharaan/add')}}" method="post">
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
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <div class="mb-3 input-group has-validation">
                                <input type="date" value="{{old('tanggal')}}" class="form-control 
                                {{ $errors->get('tanggal') ? 'is-invalid'  : ''}}"  data-date-format="DD MMMM YYYY"
                                    name="tanggal" required max="{{date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keadaan Sekarang:</label>
                            <div class="mb-3 input-group has-validation">
                                <textarea type="text" value="{{old('keluhan')}}" class="form-control 
                                {{ $errors->get('keluhan') ? 'is-invalid'  : ''}}" 
                                    name="keluhan" required> </textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tindaklanjut" class="form-label">Tindakan</label>
                            <div class="mb-3 input-group has-validation">
                                <textarea type="text" value="{{old('tindaklanjut')}}" class="form-control 
                                {{ $errors->get('tindaklanjut') ? 'is-invalid'  : ''}}" 
                                    name="tindaklanjut" > </textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan/Catatan</label>
                            <div class="mb-3 input-group has-validation">
                                <textarea type="text" value="{{old('ket')}}" class="form-control 
                                {{ $errors->get('ket') ? 'is-invalid'  : ''}}" 
                                    name="ket" > </textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("pemeliharaan/list")}}'>Cancel</a>
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