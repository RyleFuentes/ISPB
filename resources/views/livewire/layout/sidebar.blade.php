<div class="bg-white  toggled" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase mb-3 border-bottom">
        <img src="images/logo.png" class="img-fluid" width="90">
    </div>

    <div class="d-flex flex-column mb-auto fw-medium">
        <a class="item text-secondary mb-3 p-3 mx-2 {{ request()->is('dashboard*') ? 'active' : '' }}"
            href="{{ route('dashboard') }}">
            <i class="fas fa-home me-1"></i>
            <span>Dashboard</span>
        </a>
        @if (auth()->user()->role == 0)
            <a class="item text-secondary mb-3 p-3 mx-2 {{ request()->is('users*') ? 'active' : '' }}"
                href="{{ route('users') }}">
                <i class="fas fa-users me-1"></i>
                <span>Users</span>
            </a>

            <a  class="item text-secondary mb-3 p-3 mx-2 {{ request()->is('suppliers*') ? 'active' : '' }}"
                href="{{ route('suppliers') }}">
                <i class="fas fa-users me-1"></i>
                <span>Suppliers</span>
            </a>
        @endif

        <a class="item text-secondary mb-3 p-3 mx-2 {{ request()->is('products*') ? 'active' : '' }}"
            href="{{ route('products') }}">
            <i class="fas fa-box me-1"></i>
            <span>Products</span>
        </a>
        <a class="item text-secondary mb-3 p-3 mx-2 {{ request()->is('orders*') ? 'active' : '' }}"
            href="{{ route('orders') }}">
            <i class="fas fa-shopping-bag me-1"></i>
            <span>Orders</span>
        </a>

    </div>
</div>
