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
        ?>
        @if ($errors->any())
        <?php
            $getSelect = old('kodebarang');
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
                        <form action="{{url('/barang-keluar/add')}}" method="post">
                            @csrf
                            {{-- start add item --}}
                            <div class="mb-3">
                                <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                <input type="text" readonly id="picker" name="tanggalkeluar" 
                                    value="{{date('Y-m-d')}}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="kodebarang" class="form-label">Nama Barang</label>
                                        <select
                                            class="form-select select-barang {{ $errors->get('kodebarang') ? 'is-invalid'  : ''}}"
                                            name="kodebarang" aria-label="Default select example" id="select-barang"
                                            required>
                                            <option>Pilih Barang</option>
                                            @foreach ($barangs as $item)
                                            <option value="{{$item->kode}}" {{$item->kode == $getSelect ? 'selected' : ''}}>{{$item->namabarang}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="stock" class="form-label">Ready</label>
                                        <input type="text" name="stock" readonly class="form-control stok-ready"
                                            id="stok-ready">
                                        <input type="text" hidden name="namabarang" id="namabarang">
                                        <input type="text" hidden name="satuan" id="satuan">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" min="1" max="0" id="input-qty" name="qty" required>
                            </div>
                            <button type="button" disabled class="btn btn-primary" id="add">Tambah</button>
                            <a class='btn btn-warning ml-3' href='{{url("barang-keluar/list")}}'>Cancel</a>
                            {{-- end add item --}}

                            <div class="my-3" id=" show-items">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rowitem">
                                        <tr>
                                            <th colspan="4">Item Kosong</th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" disabled class='btn btn-success ml-3' id='submit'>Submit</button>
                            {{-- <button type="button" class='btn btn-danger ml-3' id="clear-storage">Clear</button> --}}
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/main.js"></script>
<script src="{{asset('js')}}/keluar.js"></script>
@endpush
