@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > edit data barang
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        <?php
            $satuanSelect = $barang->satuan_fk;
            $lokasiSelect = $barang->lokasi_fk;
            $getKondisi = $barang->kondisi;
            $getStatus = $barang->status;
        ?>
        @if ($errors->any())
        <?php
            $satuanSelect = old('satuan');
            $lokasiSelect = old('satuan');
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
                    <div class="content">
                        <form action="/barang/update/{{$barang->id}}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="card p-3 mb-2">
                                <div class="mb-2">
                                    <label for="tglperolehan" class="form-label">Tanggal Perolehan</label>
                                    <div class="mb-2 input-group has-validation">
                                        <input type="date" value="{{old('tglperolehan',$barang->tgl_perolehan)}}" class="form-control 
                                        {{ $errors->get('tglperolehan') ? 'is-invalid'  : ''}}"  data-date-format="DD MMMM YYYY"
                                            name="tglperolehan" required max="{{date('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6  mb-2">
                                        <label for="kategori" class="form-label">Jenis Aset/ Kategori</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('kategori',$barang->kategori_fk)}}" class="form-control 
                                            {{ $errors->get('kategori') ? 'is-invalid'  : ''}}" 
                                                name="kategori"  required autocomplete="off" 
                                                placeholder="laptop, infocus, sound, . ." >
                                        </div>
                                    </div>
                                    <div class="col-md-6  mb-2">
                                        <label for="kodebmn" class="form-label">Kode BMN</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('kodebmn',$barang->kode_bmn)}}" autocomplete="false" class="form-control 
                                            {{ $errors->get('kodebmn') ? 'is-invalid'  : ''}}" 
                                            name="kodebmn" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6  mb-2">
                                        <label for="merek" class="form-label">Merek/ Sernum/ Spec</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('merek',$barang->merek)}}" class="form-control 
                                            {{ $errors->get('merek') ? 'is-invalid'  : ''}}" 
                                                name="merek"  required autocomplete="off" 
                                                placeholder="Asus, Epson, Cannon, . .">
                                        </div>
                                    </div>
                                    <div class="col-md-6  mb-2">
                                        <label for="kodeitem" class="form-label">Kode Aset</label>
                                        <div class="input-group has-validation">
                                            <input type="text" value="{{old('kodeitem',$barang->kode_item)}}" autocomplete="false" class="form-control 
                                            {{ $errors->get('kodeitem') ? 'is-invalid'  : ''}}" 
                                            name="kodeitem" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="lokasi" class="form-label">Ruang / Lokasi Alat</label>
                                    <select class="form-select  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                        name="lokasi" aria-label="Default select example" required>
                                        <option value="">Pilih Lokasi</option>
                                        @foreach ($lokasis as $item)
                                        <option value="{{$item->id}}" {{$item->id == $lokasiSelect ? 'selected' : ''}}>
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
                                            <option value="{{$item->id}}" {{$item->id == $satuanSelect ? 'selected' : ''}}>
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
                                            <option value="true" {{$getStatus == 'true' || $getStatus == 'TRUE' ? 'selected' : ''}}>sedia</option>
                                            <option value="false" {{$getStatus == 'false' || $getStatus == 'FALSE' ? 'selected' : ''}}>tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="tag" class="form-label">Keyword / Tag</label>
                                    <div class="input-group has-validation">
                                        <input type="text" value="{{old('tag',$barang->keyword)}}" autocomplete="false" class="form-control 
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
                                    <input class="form-check-input" type="checkbox" id="mySwitch" 
                                    {{$barang->type == 1 ? 'checked' : '' }} 
                                    name="switchservice" value="1">
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
                                            <input type="date" value="{{old('terakhircek',$barang->pemeliharaan_terakhir)}}" class="form-control 
                                            {{ $errors->get('terakhircek') ? 'is-invalid'  : ''}}" id="checktype" data-date-format="DD MMMM YYYY"
                                                name="terakhircek" max="{{date('Y-m-d')}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktupemeliharaan" class="form-label">Jangka Pemeliharaan </label><span class="text-secondary">(bulan)</span>
                                        <div class="input-group has-validation">
                                            <input type="number" value="{{old('waktupemeliharaan',$barang->jadwal_service)}}" autocomplete="false" class="form-control 
                                            {{ $errors->get('waktupemeliharaan') ? 'is-invalid'  : ''}}" id="checktype2"
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

@endsection
@push('scripts')
    <script src="{{asset('js')}}/main.js" ></script>
    <script src="{{asset('js')}}/barang.js" ></script>
@endpush
