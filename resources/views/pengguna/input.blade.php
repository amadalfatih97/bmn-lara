@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Monitoring BMN</strong>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > Data Peminjam Tetap
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        <?php
            $getBarang = '';
            $getUser = '';
        ?>
        @if ($errors->any())
        <?php
            $getBarang = old('aset');
            $getUser = old('user');
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

                    <form action="{{url('/pengguna/add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="sarana" class="form-label">Nama Sarana</label>
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
                        <div class="mb-3">
                            <label for="aset" class="form-label">Serial / Kode Aset</label>
                            <select class="form-select  {{ $errors->get('aset') ? 'is-invalid'  : ''}}"
                                name="aset" aria-label="Default select example" required id="selectsernum">
                                <option value="">Pilih Serial...</option>

                                {{-- @foreach ($barangs as $item) --}}
                                {{-- <option value="{{$item->kode}}" {{$item->kode == $getBarang ? 'selected' : ''}}> --}}
                                    {{-- {{$item->nama_barang}} --}}
                                {{-- </option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Pengguna</label>
                            <select class="form-select  {{ $errors->get('user') ? 'is-invalid'  : ''}}"
                                name="user" aria-label="Default select example" required>
                                <option value="">Pilih Pegawai</option>
                                @foreach ($users as $item)
                                <option value="{{$item->id}}" {{$item->id == $getUser ? 'selected' : ''}}>
                                    {{$item->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <div class="mb-3 input-group has-validation">
                                <input type="text" value="{{old('perihal')}}" class="form-control 
                                {{ $errors->get('perihal') ? 'is-invalid'  : ''}}" 
                                    name="perihal" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mulai" class="form-label">Waktu Mulai</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="date" value="{{old('mulai')}}" class="form-control 
                                    {{ $errors->get('mulai') ? 'is-invalid'  : ''}}" 
                                        name="mulai" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="kembali" class="form-label">Waktu Kembali</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="date" value="{{old('kembali')}}" class="form-control 
                                    {{ $errors->get('kembali') ? 'is-invalid'  : ''}}" 
                                        name="kembali" id="inputKembali" >
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <div class="mb-3 input-group has-validation">
                                <textarea type="text" value="{{old('ket')}}" class="form-control 
                                {{ $errors->get('ket') ? 'is-invalid'  : ''}}" 
                                    name="ket" required> </textarea>
                            </div>
                        </div>
                        {{-- cek selesai --}}
                        <div class="mb-3">
                            <input name="finish" class="form-check-input" 
                            type="checkbox" id="finishCheck" value="true">
                            <label class="form-check-label" for="finishCheck">Selesai</label>
                        </div>
                        {{--  --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("pengguna/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/pengguna.js"></script>
@endpush