<nav class="navbar navbar-light text-secondary bg-light navbar-expand-lg fixed-top shadow">
    <div class="container-fluid">
        {{-- offcanvas trigger --}}

        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        {{-- endoffcancvas trigger --}}
        <a class="navbar-brand fw-bold me-auto" href="#">                        
            <img src="{{asset('images/logo-bdipadang.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end hide-to-desktop" id="navbarNavAltMarkup">
            {{-- <form action="" class="d-flex ms-auto">
                <div class="input-group my-3 my-lg-0">
                    <input type="text" class="form-control">
                    <button class="btn btn-primary" type="button" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form> --}}

            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door"><span class="hide-to-desktop"> Home</span></i></a>
                <a class="nav-link" href="#"><i class="bi bi-bell"></i><span class="hide-to-desktop"> Notif</span></a>
                <a class="nav-link" href="#"><i class="bi bi-envelope"><span class="hide-to-desktop"> Mail</span></i></a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
