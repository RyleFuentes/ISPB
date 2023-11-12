<div class="row">
    <!-- ala pa ako maisip na ilagay, lakas ng mental block -->
    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-3 bg-opacity-25 w-100 h-100">
            <div class="d-flex align-items-center justify-content-center py-1">
                <div class="prof rounded bg-primary bg-opacity-25">
                    <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}" alt="logo">
                </div>
            </div>
            <hr class="border border-3 rounded border-primary">
            <div>
                <p class="fs-4 text-center mb-0">{{ $user->name }}</p>
                @if ($user->role == 0)
                    <p class="fs-6 text-center mb-0">Admin</p>
                @else
                    <p class="fs-6 text-center mb-0">Inventory Clerk</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7 mt-3 mt-md-0 d-flex justify-content-center">
        <div class="bg-primary rounded p-2 p-sm-3 p-md-4 p-lg-5 bg-opacity-25 w-100 h-100">
            <h2 class="fs-2 fs-sm-2 text-primary">BASIC INFO</h2>

            <hr class="border border-3 rounded border-primary">

            <div class="px-3">
                <h4 class="fw-bold mb-0 fs-5">Email</h4>
                <p class="fs-5"><i class="bi bi-envelope-at-fill text-primary"></i> {{ $user->email }}</p>

                <h4 class="fw-bold mb-0 fs-5">Address</h4>
                <p class="fs-5"><i class="bi bi-geo-alt-fill text-primary"></i> Muntinlupa City</p>

                <h4 class="fw-bold mb-0 fs-5">Contact</h4>
                <p class="fs-5 mb-0"><i class="bi bi-telephone-fill text-primary"></i> 09**-***-****</p>
            </div>
        </div>
    </div>

    <div class="my-3 d-flex justify-content-center">
        <div class="bg-primary rounded p-2 p-sm-3 p-md-4 p-lg-5 bg-opacity-25 w-100">
            <h2 class="fs-2 text-primary">IN CASE OF EMERGENCY</h2>

            <hr class="border border-3 rounded border-primary">

            <div class="px-3">
                <h4 class="fw-bold mb-0 fs-5">Guardian/Parent</h4>
                <p class="fs-5"><i class="bi bi-person-badge-fill text-primary"></i> Larry Gadon</p>

                <h4 class="fw-bold mb-0 fs-5">Address</h4>
                <p class="fs-5"><i class="bi bi-geo-alt-fill text-primary"></i> Muntinlupa City</p>

                <h4 class="fw-bold mb-0 fs-5">Emergency Contact</h4>
                <p class="mb-0 fs-5"><i class="bi bi-telephone-fill text-primary"></i> 09**-***-****</p>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn position-relative">
            <i class="bi bi-bell-fill text-primary"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">unread notification</span>
            </span>
        </button>
    </div>

</div>