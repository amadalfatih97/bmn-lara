<div>
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12">
            <button wire:click="eventAdd()" class="btn btn-success mb-3 me-2 ">input</button>
        </div>
        <div class="col-md-6 col-sm-12 col-12">
            <form action='{{url("report/out")}}' method="POST">
            <div class="row">
                    <div class="col-md-6 col-sm-12  col-12">
                        <div class="input-group mb-2">
                            <input name="startdate" id="picker-start" placeholder="tanggal awal" type="text"
                                class="form-control" onchange="this.dispatchEvent(new InputEvent('input'))">
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-calendar-event"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  col-12">
                        <div class="input-group mb-2">
                            <input name="enddate" id="picker-end" placeholder="tanggal akhir" type="text" class="form-control"
                                onchange="this.dispatchEvent(new InputEvent('input'))">
                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Filter">
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
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Kode</th>
                        <th>User</th>
                        <th>Jumlah Item</th>
                        <th>Tanggal</th>
                        <th>status</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @forelse($permintaans as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->pinjam_fk}}</td>
                            <td>{{$data->user_fk}}</td>
                            <td>{{$data->jumlah}} item</td>
                            <td>{{$data->waktu_req}}</td>
                            <td>{{$data->status}}</td>
                            <td><a class="btn btn-outline-primary " data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Lihat Detail" href='{{url("barang-keluar/detail/{$data->trans_fk}")}}'>
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
    @include('livewire.permintaan.modal.add-modal')
</div>

