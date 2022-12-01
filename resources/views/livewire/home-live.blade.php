<div>
    <div class="card">
        <div class="card-body">
            {{---<livewire:livewire-column-chart
                :column-chart-model="$columnChartModel"
            />--}}
            <div class="row">
                <div class="col-md-3">
                    <div class="card  mb-2">
                        <div class="card-body d-flex text-light align-items-end bg-primary">
                            <i class="bi bi-menu-button-wide " style="font-size:50px;"></i>
                            <span class="fs-1 mx-2 align-self-end">{{$barangs->qty}}</span>
                            <p class="align"> Total aset</p>
                        </div>
                        <hr class="m-0"/>
                        <div class="card-footer d-flex">
                            <em class="me-auto text-muted">detail</em>
                            <i class="bi bi-arrow-right-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body d-flex text-light align-items-end bg-success">
                            <i class="bi bi-inboxes-fill " style="font-size:50px;"></i>
                            <span class="fs-1 mx-2 align-self-end">0{{-- {{$antrian}} --}}</span>
                            <p class="align"> Antrian Permintaan</p>
                        </div>
                        <hr class="m-0"/>
                        <div class="card-footer d-flex">
                            <em class="me-auto text-muted">detail</em>
                            <i class="bi bi-arrow-right-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body d-flex text-light align-items-end bg-danger">
                            <i class="bi bi-clipboard-pulse" style="font-size:50px;"></i>
                            <span class="fs-1 mx-2 align-self-end">0{{-- {{$pakai->total}} --}}</span>
                            <p class="align"> Aset Digunakan</p>
                        </div>
                        <hr class="m-0"/>
                        <div class="card-footer d-flex">
                            <em class="me-auto text-muted">detail</em>
                            <i class="bi bi-arrow-right-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body d-flex text-light align-items-end bg-warning">
                            <i class="bi bi-calendar-week " style="font-size:50px;"></i>
                            <span class="fs-1 mx-2 align-self-end">{{date('Y')}}</span>
                            <p class="align"> {{date('M')}}</p>
                        </div>
                        <hr class="m-0"/>
                        <div class="card-footer d-flex">
                            <em class="me-auto text-muted">{{date('H:i D, d M Y')}}</em>
                            <i class="bi bi-arrow-right-circle"></i>
                        </div>
                    </div>        
                </div>
            </div>

            {{-- <img src="{{asset('images/asets/chart.png')}}" width="100%" alt="chart" > --}}
        </div>
    </div>
</div>
