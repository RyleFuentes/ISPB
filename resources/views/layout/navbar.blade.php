<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-justify primary-text fs-4 me-3 text-white" id="menu-toggle"></i>
        <h2 class="fs-6 fw-bold m-0 text-white">
            {{ request()->is('dashboard*') ? 'Dashboard' : '' }}
            {{ request()->is('products*') ? 'Products' : '' }}
            {{ request()->is('users*') ? 'Users' : '' }}
        </h2>
    </div>
</nav>
