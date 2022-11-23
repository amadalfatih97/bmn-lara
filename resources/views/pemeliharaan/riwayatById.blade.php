<div class="modal fade riwayatPemeliharaan" wire:ignore.self role="dialog" aria-hidden="true"
    data-keyboard="false" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h5 class="modal-title">Riwayat Pemeliharaan</h5>
                    <span class="pt-2 text-muted">AC Daikin | 123</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="m-0"/>
            <div class="d-grid gap-2 d-flex justify-content-end mt-3 mx-3">
                <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i> cetak</button>
                {{-- <button type="button" class="btn btn-secondary btn-sm">button</button> --}}
            </div>
            <div class="card m-3 overflow-auto">
                <table  class="table table-striped table-hover">
                    <thead>
                        <th>No</th><th>Tanggal</th><th>Kegiatan</th><th>Pelaksana</th><th>Kondisi Sebelum</th>
                    </thead>
                    <tbody id="rowitem">
                        
                    </tbody>
                </table>
            </div>

        </div>    

    </div>
</div>