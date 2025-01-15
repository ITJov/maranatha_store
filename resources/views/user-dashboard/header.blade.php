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
                       aria-expanded="false" id="dropdownCategory">
                        Select category
                    </a>
                    <ul id="category" class="dropdown-menu border-0 background-secondary text-light">
                        <li><a class="dropdown-item text-light" href="{{ route('product.index') }}"
                               onclick="updateCategory('All Product')">All Product</a></li>
                        <li><a class="dropdown-item text-light" href="{{ route('product.category', 'foods') }}"
                               onclick="updateCategory('Food')">Food</a></li>
                        <li><a class="dropdown-item text-light" href="{{ route('product.category', 'drinks') }}"
                               onclick="updateCategory('Drink')">Drink</a></li>
                        <li><a class="dropdown-item text-light" href="{{ route('product.category', 'stationery') }}"
                               onclick="updateCategory('Stationery')">Stationery</a></li>
                        <li><a class="dropdown-item text-light" href="{{ route('product.category', 'medicines') }}"
                               onclick="updateCategory('Medicine')">Medicine</a></li>
                    </ul>
                <li class="search">
                    <div class="container ">
                        <form action="{{ route('product.search') }}" method="POST">
                             @csrf
                            <div class="input-group rounded shadow-sm  border rounded-1 py-1"
                                 style="background-color: #F3F9FB;">
                                <button class="input-group-text bg-transparent border-0 text-muted">
                                    <i class="bi bi-search" style="color: #f97316;"></i>
                                </button>
                                <input type="text" name="search" class="form-control border-0 bg-transparent"
                                       placeholder="Search essentials, groceries and more..." aria-label="Search">
                            </div>
                        </form>
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
                            @if(Auth::check())
                                <a class="nav-link dropdown-toggle fs-5" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="color-primary bi bi-person fs-5"></i>
                                    {{ Str::ucfirst(Auth::user()->name) }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/user-profile/index">Profile</a></li>
                                    <li><a class="dropdown-item" href="/invoice_user/history">History</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            @else
                                <a class="nav-link fs-5" href="{{ route('login') }}">
                                    <i class="color-primary bi bi-person fs-5"></i>
                                    Guest
                                </a>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- biar dropdown sesuai sama kategori yang dipilih -->
<script>
    function updateCategory(category) {
        document.getElementById('dropdownCategory').textContent = category;
        // simpan ke localStorage
        localStorage.setItem('selectedCategory', category);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const pathWebsite = window.location.pathname;
        const dropdown = document.getElementById('dropdownCategory');

        // reset dropdown kalo ke dashboard & cart
        if (pathWebsite.includes('/user-dashboard/index') || pathWebsite.includes('/carts/cart-index')) {
            localStorage.removeItem('selectedCategory');
            dropdown.textContent = 'Select category';
        } else {
            const savedCategory = localStorage.getItem('selectedCategory');
            if (savedCategory) {
                dropdown.textContent = savedCategory;
            } else {
                dropdown.textContent = 'Select category';
            }
        }
    });
</script>
