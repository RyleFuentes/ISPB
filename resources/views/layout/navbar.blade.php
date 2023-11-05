<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-3 mt-3 shadow rounded-3">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-justify primary-text fs-4 me-3 text-primary" id="menu-toggle"></i>
        <h2 class="fs-6 fw-bold m-0 text-primary">
            {{ request()->is('dashboard') ? 'Dashboard' : '' }}
            {{ request()->is('products') ? 'Products' : '' }}
             {{ request()->is('orders') ? 'Orders' : '' }}
            {{ request()->is('users') ? 'Users' : '' }}
            {{ request()->is('profile') ? 'Profile' : '' }}
        </h2>
    </div>

    {{-- <form class="d-flex ms-auto">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
        </button>
        <input class="form-control me-2 bg-primary text-white search" type="search" placeholder="Search" aria-label="Search" style="border-bottom-color: white;">
    </form> --}}
</nav>
