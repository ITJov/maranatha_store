<div class="container-fluid nav-color d-flex justify-content-between p-3 px-5">
    <div>Welcome to Maranatha Store!</div>
    <div>
        <span class="me-1">Universitas Kristen Marnatha</span>
        <span>|</span>
        <span class="ms-1">PT. Danamartha Sejahtera Utama</span>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid p-3 px-5 d-flex align-items-center">
        <img class="logo pe-3" src="{{asset('assets/images/logo.png')}}" alt="maranatha store">
        <a class="navbar-brand" href="{{url('user-dashboard/index')}}">Maranatha Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse m-0 p-0" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex align-items-center justify-content-between w-100">
                <li class="nav-item dropdown ms-3 background-secondary rounded-3 p-0 px-2">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Select category
                    </a>
                    <ul id="category" class="dropdown-menu border-0 background-secondary text-light">
                        <li><a class="dropdown-item text-light" href="#">Food</a></li>
                        <li><a class="dropdown-item text-light" href="#">Drink</a></li>
                        <li><a class="dropdown-item text-light" href="#">Stationery</a></li>
                        <li><a class="dropdown-item text-light" href="#">Medicine</a></li>
                    </ul>
                </li>
                <li class="search">
                    <div class="container ">
                        <div class="input-group rounded shadow-sm  border rounded-1 py-1"
                             style="background-color: #F3F9FB;">
                                <span class="input-group-text bg-transparent border-0 text-muted">
                                    <i class="bi bi-search" style="color: #f97316;"></i>
                                </span>
                            <input type="text" class="form-control border-0 bg-transparent"
                                   placeholder="Search essentials, groceries and more..." aria-label="Search">
                        </div>
                    </div>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <div>
                        <a class="nav-link fs-5" href="/carts/cart-index">
                            <i class="color-primary bi bi-cart pe-1 fs-5"></i>
                            Cart
                        </a>
                    </div>
                    <div class="px-3">|</div>
                    <ul style="list-style-type: none" class="p-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="color-primary bi bi-person fs-5"></i>
                                {{Str::ucfirst(Auth::user()->name)}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">History</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>