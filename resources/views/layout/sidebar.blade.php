<div class="bg-white border shadow rounded-3 toggled" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase mb-3 border-bottom">
        <img src="images/logo.png" class="img-fluid" width="90">
    </div>

    <div class="d-flex flex-column mb-auto">
        <a class="item text-secondary mb-3 p-3 mx-2 active"  aria-current="page" href="{{route('dashboard')}}">
        <i class="fas fa-home me-1"></i>
            <span>Dashboard</span>
        </a>
        <a class="item text-secondary mb-3 p-3 mx-2" href="{{route('products')}}">
        <i class="fas fa-box me-1"></i>
            <span>Products</span>
        </a>
        <a class="item text-secondary mb-3 p-3 mx-2" href="{{route('products')}}">
            <i class="fas fa-shopping-bag me-1"></i>
            <span>Orders</span>
        </a>
        <a class="item text-secondary mb-3 p-3 mx-2" href="{{route('users')}}">
            <i class="fas fa-users me-1"></i>
            <span>Users</span>
        </a>
    </div>

    <livewire:components.logout />

</div>
