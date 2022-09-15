<div class="offcanvas offcanvas-start bg-dark
    text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav py-3">
                <li>
                    <a class="navbar-brand fw-bold me-auto px-3" href="#">
                        <img src="{{asset('images/logo-bdipadang-white.png')}}" alt="">
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                    <div class="text-muted small fw-bold-text-uppercase px-3">
                        Menu
                    </div>
                </li>
                {{-- <li>
                    <hr class="dropdown-divider" />
                </li> --}}
                {{--<li>
                     <div class="text-muted small fw-bold-text-uppercase px-3">
                        Menu
                    </div>
                </li> --}}
                <li>
                    <a href='{{url("")}}' class="nav-link px-3 {{ Request::segment(1) == '' ? 'active' : null }}">
                        <span class="me-2"><i class="bi bi-house"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href='{{url("barang/list")}}' class="nav-link px-3 {{ Request::segment(1) == 'barang' ? 'active' : null }}">
                        <span class="me-2"><i class="bi bi-files"></i></span>
                        <span>Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href='{{url("permintaan/list")}}' class="nav-link px-3 {{ Request::segment(1) == 'permintaan' ? 'active' : null }}">
                        <span class="me-2"><i class="bi bi-files"></i></span>
                        <span>Permintaan</span>
                    </a>
                </li>
                <li class="mt-4">
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <div class="text-muted small fw-bold-text-uppercase px-3">
                        Other
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2"><i class="bi bi-files"></i></span>
                        <span>Setting</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'setting' ? 'show' : null }}" id="collapseExample">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href='{{url("setting/satuan/list")}}' class="nav-link px-3 {{ Request::segment(2) == 'satuan' ? 'active' : null }}">
                                        <span class="me-2"><i class="bi bi-files"></i></span>
                                        <span>Data Satuan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{url("setting/kategori/list")}}' class="nav-link px-3 {{ Request::segment(2) == 'kategori' ? 'active' : null }}">
                                        <span class="me-2"><i class="bi bi-files"></i></span>
                                        <span>Data Kategori</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{url("setting/lokasi/list")}}' class="nav-link px-3 {{ Request::segment(2) == 'lokasi' ? 'active' : null }}">
                                        <span class="me-2"><i class="bi bi-files"></i></span>
                                        <span>Data Lokasi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample2"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2"><i class="bi bi-files"></i></span>
                        <span>Report</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="collapseExample2">
                        <ul class="navbar-nav ps-3"> 
                            <li>
                                <a href="" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-files"></i></span>
                                    <span>Data 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-files"></i></span>
                                    <span>Data 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
