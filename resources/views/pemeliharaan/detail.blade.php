<div class="modal fade detailPemeliharaanModal" role="dialog" wire:ignore.self tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content shadow-lg ">
            <div class="modal-header">
                <h6 class="modal-title">Detail Pemeliharaan Aset BMN</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div> 
            <div class="modal-body">
                <div class="card">
                    {{-- <div class="card-header text-center">
                        <img src="{{asset('images/asets/thumb.png')}}" class="img-fluid" alt="...">
                    </div> --}}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <u class="fw-bolder">Data Aset</u>
                                <table>
                                    <tr>
                                        <td>Aset</td>
                                        <td>:</td>
                                        <td>{{$detail['kategori'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Merek</td>
                                        <td>:</td>
                                        <td>{{$detail['merek'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td>{{$detail['lokasi'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode BMN</td>
                                        <td>:</td>
                                        <td> {{$detail['kode'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            
                            <hr class="divider d-md-none d-sm-block" />
                            <div class="col-md-4 ms-auto">
                                <u class="fw-bolder"> Tanggal Pelaksanaan</u> 
                                <p>{{$detail['tanggal'] }}</p>
                            </div>
                        </div>

                        <hr class="divider" />
                        <span class="fw-bolder">Kegiatan</span> 
                        {{-- <p>{{$detail['tindakan'] }}</p> --}}
                        <textarea class="form-control bg-white" rows="3" readonly wire:model="detail.tindakan"></textarea>
                        
                        <hr class="divider" />
                        <span class="fw-bolder">Kondisi Sebelum Pemeliharaan</span> 
                        {{-- <p>{{$detail['kondisi'] }}</p> --}}
                        <textarea class="form-control bg-white" rows="3" readonly wire:model="detail.kondisi"></textarea>
                        
                        <hr class="divider" />
                        <div class="d-grid">
                            <button class="btn btn-outline-warning"> <i class="bi bi-printer"></i> cetak</button>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>