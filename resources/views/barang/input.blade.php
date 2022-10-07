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
                    <div class="input-cek mb-3 d-flex">
                        <div class="form-check me-3 radio_wrap" data-radio="radio_1">
                            <input class="form-check-input" type="radio" name="typeinput" id="type-input2" value="1"
                            checked>
                            <label class="form-check-label" for="type-input2">
                                Barang Baru
                            </label>
                        </div>
                        <div class="form-check radio_wrap" data-radio="radio_2">
                            <input class="form-check-input" type="radio" name="typeinput" id="type-input1" value="0"
                                 >
                            <label class="form-check-label" for="type-input1">
                                Barang Sudah Ada
                            </label>
                        </div>
                    </div>
                    <div class="content">
                        <div class="radio_content radio_1" id="barang-baru">
                            <form action="{{url('/barang/add')}}" method="post">
                                @csrf
                                <label for="jenis" class="form-label">Jenis Aset</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="text" value="{{old('jenis')}}" class="form-control 
                                    {{ $errors->get('jenis') ? 'is-invalid'  : ''}}" 
                                        name="jenis" required>
                                </div>
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
                                    id="exampleInputbarang" name="kode" required autocomplete="off">
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
                        <!--  -->
                        <div class="radio_content radio_2" id="barang-lama">
                            <form action="{{url('/barang/masuk')}}" method="post">
                                @csrf
                                <label for="namabarang" class="form-label">Pilih Aset</label>
                                <div class="mb-3 input-group has-validation">
                                    <select class="form-select  {{ $errors->get('namabarang') ? 'is-invalid'  : ''}}" 
                                        name="namabarang" required>
                                        <option>Pilih Satuan</option>
                                        @foreach ($barangs as $item)
                                        <option value="{{$item->nama_barang}}" {{$item->nama_barang == $getSelect ? 'selected' : ''}}>
                                            {{$item->nama_barang}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="kode" class="form-label">Kode Aset</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="text" value="{{old('kode')}}" autocomplete="false" class="form-control 
                                    {{ $errors->get('kode') ? 'is-invalid'  : ''}}" id="exampleInputbarang" 
                                    id="exampleInputbarang" name="kode" required autocomplete="off">
                                </div>
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
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{asset('js')}}/main.js" ></script>
    <script src="{{asset('js')}}/barang.js" ></script>
@endpush