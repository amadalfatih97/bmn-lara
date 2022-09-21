@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > data barang
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">

        <?php
            $getSelect = '';
            $getLokasi = '';
            $getStatus = '';
            $getKondisi = '';
        ?>
        @if ($errors->any())
        <?php
            $getSelect = old('satuan');
            $getLokasi = old('lokasi');
            $getStatus = old('status');
            $getKondisi = old('kondisi');
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
                    
                    <form action="{{url('/barang/add')}}" method="post">
                        @csrf
                        <label for="namabarang" class="form-label">Input Nama Aset</label>
                        <div class="mb-3 input-group has-validation">
                            <input type="text" value="{{old('namabarang')}}" class="form-control 
                            {{ $errors->get('namabarang') ? 'is-invalid'  : ''}}" id="exampleInputbarang"
                                name="namabarang" required>
                        </div>
                        <label for="kode" class="form-label">Kode Aset</label>
                        <div class="mb-3 input-group has-validation">
                            <input type="text" value="{{old('kode')}}" autocomplete="false" class="form-control 
                            {{ $errors->get('kode') ? 'is-invalid'  : ''}}" id="exampleInputbarang" 
                            id="exampleInputbarang" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" value="{{old('stok')}}" class="form-control  
                            {{ $errors->get('stok') ? 'is-invalid'  : ''}}" id="exampleInputstok" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select  {{ $errors->get('satuan') ? 'is-invalid'  : ''}}"
                                name="satuan" aria-label="Default select example" required>
                                <option>Pilih Satuan</option>
                                @foreach ($satuans as $item)
                                <option value="{{$item->id}}" {{$item->id == $getSelect ? 'selected' : ''}}>
                                    {{$item->nama_satuan}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="tanggalmasuk" class="form-label">Tanggal Masuk</label>
                            <input autocomplete="false" type="text" id="picker" name="tanggalmasuk" 
                             class="form-control" required>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <textarea class="form-control  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                name="lokasi" id="exampleFormControlTextarea1" rows="3"
                                required>{{old('lokasi')}}</textarea>
                        </div> --}}
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Ruang / Lokasi Alat</label>
                            <select class="form-select  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                name="lokasi" aria-label="Default select example" required>
                                <option>Pilih Lokasi</option>
                                @foreach ($lokasis as $item)
                                <option value="{{$item->id}}" {{$item->id == $getLokasi ? 'selected' : ''}}>
                                    {{$item->nama_lokasi}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <select class="form-select  {{ $errors->get('kondisi') ? 'is-invalid'  : ''}}"
                                name="kondisi" aria-label="Default select example" required>
                                <option>Pilih Kondisi</option>
                                <option value="b" {{$getKondisi == 'b' ? 'selected' : ''}}>Baik</option>
                                <option value="rr" {{$getKondisi == 'rr' ? 'selected' : ''}}>Rusak Ringan</option>
                                <option value="rb" {{$getKondisi == 'rb' ? 'selected' : ''}}>Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select  {{ $errors->get('status') ? 'is-invalid'  : ''}}"
                                name="status" aria-label="Default select example" required>
                                <option>Pilih Status</option>
                                <option value="true" {{$getStatus == 'true' ? 'selected' : ''}}>sedia</option>
                                <option value="false" {{$getStatus == 'false' ? 'selected' : ''}}>tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea class="form-control  
                                {{ $errors->get('ket') ? 'is-invalid'  : ''}}" name="ket"
                                id="exampleFormControlTextarea1" rows="3">{{old('ket')}} </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("barang/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{asset('js')}}/main.js" ></script>
@endpush