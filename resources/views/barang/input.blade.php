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
            $getKategori = '';
        ?>
        @if ($errors->any())
        <?php
            $getSelect = old('satuan');
            $getLokasi = old('lokasi');
            $getStatus = old('status');
            $getKondisi = old('kondisi');
            $getKategori = old('kategori');
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
                    <div class="input-cek mb-2 d-flex">
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
                                <div class="card p-3 mb-2">
                                    <div class="mb-2">
                                        <label for="tglperolehan" class="form-label">Tanggal Perolehan</label>
                                        <div class="mb-2 input-group has-validation">
                                            <input type="date" value="{{old('tglperolehan')}}" class="form-control 
                                            {{ $errors->get('tglperolehan') ? 'is-invalid'  : ''}}"  data-date-format="DD MMMM YYYY"
                                                name="tglperolehan" required max="{{date('Y-m-d')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6  mb-2">
                                            <label for="kategori" class="form-label">Nama Aset/ Kategori</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('kategori')}}" class="form-control 
                                                {{ $errors->get('kategori') ? 'is-invalid'  : ''}}" 
                                                    name="kategori"  required autocomplete="off" placeholder="laptop, infocus, sound, . .">
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="kodebmn" class="form-label">Kode BMN</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('kodebmn')}}" autocomplete="false" class="form-control 
                                                {{ $errors->get('kodebmn') ? 'is-invalid'  : ''}}" 
                                                name="kodebmn" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6  mb-2">
                                            <label for="merek" class="form-label">Merek/ Sernum/ Spec</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('merek')}}" class="form-control 
                                                {{ $errors->get('merek') ? 'is-invalid'  : ''}}" 
                                                    name="merek"  required autocomplete="off" placeholder="Asus, Epson, Cannon, . .">
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="kodeitem" class="form-label">Kode Aset</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('kodeitem')}}" autocomplete="false" class="form-control 
                                                {{ $errors->get('kodeitem') ? 'is-invalid'  : ''}}" 
                                                name="kodeitem" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
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
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="satuan" class="form-label">Satuan</label>
                                            <select class="form-select  {{ $errors->get('satuan') ? 'is-invalid'  : ''}}"
                                                name="satuan" aria-label="Default select example" required>
                                                <option value="">Pilih Satuan</option>
                                                @foreach ($satuans as $item)
                                                <option value="{{$item->id}}" {{$item->id == $getSelect ? 'selected' : ''}}>
                                                    {{$item->nama_satuan}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <select class="form-select  {{ $errors->get('kondisi') ? 'is-invalid'  : ''}}"
                                                name="kondisi" aria-label="Default select example" required>
                                                <option>Pilih Kondisi</option>
                                                <option value="b" {{$getKondisi == 'b' ? 'selected' : ''}}>Baik</option>
                                                <option value="rr" {{$getKondisi == 'rr' ? 'selected' : ''}}>Rusak Ringan</option>
                                                <option value="rb" {{$getKondisi == 'rb' ? 'selected' : ''}}>Rusak Berat</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="status" class="form-label">Status Pinjam</label>
                                            <select class="form-select  {{ $errors->get('status') ? 'is-invalid'  : ''}}"
                                                name="status" aria-label="Default select example" required>
                                                <option>Pilih Status</option>
                                                <option value="true" {{$getStatus == 'true' ? 'selected' : ''}}>sedia</option>
                                                <option value="false" {{$getStatus == 'false' ? 'selected' : ''}}>tidak Tersedia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="tag" class="form-label">Keyword / Tag</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('tag')}}" autocomplete="false" class="form-control 
                                            {{ $errors->get('tag') ? 'is-invalid'  : ''}}" 
                                            name="tag" required placeholder="#laptop #kamera #soundsistem #proyektor. . .">
                                        </div>
                                    </div>
                                    {{-- <div class="mb-2">
                                        <label for="ket" class="form-label">Keterangan</label>
                                        <textarea class="form-control  
                                            {{ $errors->get('ket') ? 'is-invalid'  : ''}}" name="ket"
                                            id="exampleFormControlTextarea1" rows="3">{{old('ket')}} </textarea>
                                    </div> --}}
                                </div>
                                
                                <div class="card p-3  mb-3">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="switchservice" value="1">
                                        <label class="form-check-label" for="mySwitch">Type Service Berkala</label>
                                    </div>
                                    {{-- <div class="mb-2">
                                        <label for="pemeliharaanterakhir" class="form-label">Pemeliharaan Terakhir</label>
                                        <div class="mb-2 input-group has-validation">
                                            <input type="date" value="{{old('pemeliharaanterakhir')}}" class="form-control 
                                            {{ $errors->get('pemeliharaanterakhir') ? 'is-invalid'  : ''}}"  data-date-format="DD MMMM YYYY"
                                                name="pemeliharaanterakhir" max="{{date('Y-m-d')}}">
                                        </div>
                                    </div> --}}
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="terakhircek" class="form-label">Terakhir Pemeliharaan</label>
                                            <div class="mb-2 input-group has-validation">
                                                <input type="date" value="{{old('terakhircek')}}" class="form-control 
                                                {{ $errors->get('terakhircek') ? 'is-invalid'  : ''}}" id="checktype" data-date-format="DD MMMM YYYY"
                                                    name="terakhircek" max="{{date('Y-m-d')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="waktupemeliharaan" class="form-label">Jangka Pemeliharaan</label>
                                            <div class="input-group has-validation">
                                                <input type="number" value="{{old('waktupemeliharaan')}}" autocomplete="false" class="form-control 
                                                {{ $errors->get('waktupemeliharaan') ? 'is-invalid'  : ''}}" id="checktype"
                                                name="waktupemeliharaan" placeholder="dalam hitungan bulan" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class='btn btn-warning ml-3' href='{{url("barang/list")}}'>Cancel</a>
                            </form>
                        </div>


                        <!--====================================================  -->
                        <div class="radio_content radio_2" id="barang-lama">
                            <form action="{{url('/barang/masuk')}}" method="post">
                                @csrf
                                <div class="card p-3 mb-2">
                                    
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="tglperolehan" class="form-label">Tanggal Perolehan</label>
                                            <div class="mb-2 input-group has-validation">
                                                <input type="date" value="{{old('tglperolehan')}}" class="form-control 
                                                {{ $errors->get('tglperolehan') ? 'is-invalid'  : ''}}"  data-date-format="DD MMMM YYYY"
                                                    name="tglperolehan" required max="{{date('Y-m-d')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="kategori" class="form-label">Nama Aset/ Kategori</label>
                                            <select class="form-select  {{ $errors->get('kategori') ? 'is-invalid'  : ''}}"
                                                name="kategori" id="select-kategori" aria-label="Default select example" required>
                                                <option value="">---Pilih Aset---</option>
                                                @foreach ($kategoris as $item)
                                                <option value="{{$item->kategori_fk}}" {{$item->kategori_fk == $getKategori ? 'selected' : ''}}>
                                                    {{$item->kategori_fk}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="kodebmn" class="form-label">Kode BMN</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('kodebmn')}}" id="kode-bmn" class="form-control 
                                                {{ $errors->get('kodebmn') ? 'is-invalid'  : ''}}" 
                                                name="kodebmn" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="merek" class="form-label">Merek/ Sernum/ Spec</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('merek')}}" class="form-control 
                                                {{ $errors->get('merek') ? 'is-invalid'  : ''}}" 
                                                    name="merek"  required autocomplete="off" placeholder="Asus, Epson, Cannon, . .">
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-2">
                                            <label for="kodeitem" class="form-label">Kode Aset</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{old('kodeitem')}}" class="form-control 
                                                {{ $errors->get('kodeitem') ? 'is-invalid'  : ''}}" 
                                                name="kodeitem" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="lokasi" class="form-label">Ruang / Lokasi Alat</label>
                                        <select class="form-select  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                            name="lokasi" aria-label="Default select example" required
                                            id="lokasi">
                                            <option>Pilih Lokasi</option>
                                            @foreach ($lokasis as $item)
                                            <option value="{{$item->id}}" {{$item->id == $getLokasi ? 'selected' : ''}}>
                                                {{$item->nama_lokasi}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="satuan" class="form-label">Satuan</label>
                                            <div class="input-group has-validation">
                                                {{-- <input type="text" value="{{old('kodesatuan')}}" id="satuan" class="form-control 
                                                {{ $errors->get('satuan') ? 'is-invalid'  : ''}}" 
                                                name="satuan" required readonly> --}}
                                                <select class="form-select  {{ $errors->get('satuan') ? 'is-invalid'  : ''}}"
                                                    name="satuan" aria-label="Default select example" required disabled
                                                    id="satuan">
                                                    <option value="">Pilih Satuan</option>
                                                    @foreach ($satuans as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $getSelect ? 'selected' : ''}}>
                                                        {{$item->nama_satuan}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <select class="form-select  {{ $errors->get('kondisi') ? 'is-invalid'  : ''}}"
                                                name="kondisi" aria-label="Default select example" required>
                                                <option>Pilih Kondisi</option>
                                                <option value="b" {{$getKondisi == 'b' ? 'selected' : ''}}>Baik</option>
                                                <option value="rr" {{$getKondisi == 'rr' ? 'selected' : ''}}>Rusak Ringan</option>
                                                <option value="rb" {{$getKondisi == 'rb' ? 'selected' : ''}}>Rusak Berat</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="status" class="form-label">Status Pinjam</label>
                                            <select class="form-select  {{ $errors->get('status') ? 'is-invalid'  : ''}}"
                                                name="status" aria-label="Default select example" required>
                                                <option>Pilih Status</option>
                                                <option value="true" {{$getStatus == 'true' ? 'selected' : ''}}>sedia</option>
                                                <option value="false" {{$getStatus == 'false' ? 'selected' : ''}}>tidak Tersedia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="tag" class="form-label">Keyword / Tag</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('tag')}}" id="tag" class="form-control 
                                            {{ $errors->get('tag') ? 'is-invalid'  : ''}}" 
                                            name="tag" required placeholder="#laptop #kamera #soundsistem #proyektor. . .">
                                        </div>
                                    </div>
                                    {{-- <div class="mb-2">
                                        <label for="ket" class="form-label">Keterangan</label>
                                        <textarea class="form-control  
                                            {{ $errors->get('ket') ? 'is-invalid'  : ''}}" name="ket"
                                            id="exampleFormControlTextarea1" rows="3">{{old('ket')}} </textarea>
                                    </div> --}}
                                </div>
                                
                                <div class="card p-3  mb-3">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="my-switch"
                                        disabled name="switchservice" value="1">
                                        <label class="form-check-label" for="mySwitch">Type Service Berkala</label>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="terakhircek" class="form-label">Terakhir Pemeliharaan</label>
                                            <div class="mb-2 input-group has-validation">
                                                <input type="date" value="{{old('terakhircek')}}" class="form-control 
                                                {{ $errors->get('terakhircek') ? 'is-invalid'  : ''}}" id="checktype" data-date-format="DD MMMM YYYY"
                                                    name="terakhircek" max="{{date('Y-m-d')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="waktupemeliharaan" class="form-label">Jangka Pemeliharaan</label>
                                            <div class="input-group has-validation">
                                                <input type="number" id="jangka-pemeliharaan" 
                                                class="form-control" readonly 
                                                name="waktupemeliharaan" placeholder="dalam hitungan bulan" > 
                                            </div>
                                        </div>
                                    </div>
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