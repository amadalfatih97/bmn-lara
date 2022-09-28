<div>
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12">
            <a href='{{url("permintaan/input")}}' class="btn btn-success mb-3 me-2 ">input</a>
        </div>
        <div class="col-md-6 col-sm-12 col-12">
            <form >
                <div class="row">
                    <div class="col-md-6 col-sm-12  col-12">
                        <div class="input-group mb-2"  data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="tampilkan mulai dari tanggal">
                            <input name="startdate" id="picker" placeholder="tanggal awal" type="text" autocomplete="off"
                                class="form-control" wire:model="date1" onchange="this.dispatchEvent(new InputEvent('input'))">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="bi bi-calendar-event"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  col-12">
                        <div class="input-group mb-2"  data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="tampilkan sampai tanggal">
                            <input name="enddate" id="picker2" placeholder="tanggal akhir" type="text" class="form-control"
                                wire:model="date2" onchange="this.dispatchEvent(new InputEvent('input'))" autocomplete="off">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="bi bi-calendar-event"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-auto">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Kode</th>
                        @if (Auth::user()->role == 'admin')
                            <th>User</th>
                        @endif
                        <th>Qty</th>
                        <th>Tanggal Request</th>
                        <th>status</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @forelse($permintaans as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->pinjam_fk}}</td>
                            @if (Auth::user()->role == 'admin')
                                <td>{{$data->name}}</td>
                            @endif
                            <td>{{$data->jumlah}} Barang</td>
                            <td>{{date('d M Y  H:i', strtotime($data->created_at))}} </td>
                            <td><span role="button" class="badge 
                                    {{$data->status == 'pending' ? 'bg-warning' : 
                                    ($data->status == 'approved' ? 'bg-info' : 
                                    ($data->status == 'applied' ? 'bg-primary' : 'bg-success'))}}"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="{{$data->status == 'pending' ? 'menunggu persetujuan' : 
                                    ($data->status == 'approved' ? 'permintaan disetujui' : 
                                    ($data->status == 'applied' ? 'barang digunakan' : 'barang dikembalikan'))}}">
                                    {{$data->status}}
                                </span>
                            </td>
                            <td><a class="btn btn-outline-primary " data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Lihat Detail" href='{{url("permintaan/detail/{$data->pinjam_fk}")}}'>
                                    <span class="hide-to-mobile">-<<</span> <i class="bi bi-eye-fill"></i><span
                                    class="hide-to-mobile">>>-</span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="7">data not found!</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

