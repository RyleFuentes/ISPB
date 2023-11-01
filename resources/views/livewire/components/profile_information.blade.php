<div>
    <!-- ala pa ako maisip na ilagay, lakas ng mental block -->
    <div class="d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-5 bg-opacity-25 w-75">
            <div class="d-flex align-items-center justify-content-center py-1">
                <div class="prof rounded bg-secondary">
                    <img class="img prof" src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
            </div>
            <hr>
            <div class="px-3">
                <p class="px-3 fs-3 text-center">{{ $user->name }}</p>
                @if ($user->role == 0)
                    <p class="px-3 fs-5 text-center">Admin</p>
                @else
                    <p class="px-3 fs-4">Inventory Clerk</p>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        <div class="bg-primary rounded px-5 pt-5 bg-opacity-25 w-75">
            <h2 class="fs-2">ABOUT</h2>
            <hr />
            <small class="badge rounded-pill bg-primary fs-4">Email</small>
            <p class="px-3 fs-5">{{ $user->email }}</p>
            <small class="badge rounded-pill bg-primary fs-4">Address</small>
            <p class="px-3 fs-5">Muntinlupa City</p>
            <small class="badge rounded-pill bg-primary fs-4">Contact</small>
            <p class="px-3 fs-5">09**-***-****</p>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        <div class="bg-primary rounded px-5 pt-5 bg-opacity-25 w-75">
            <h2 class="fs-2">IN CASE OF EMERGENCY</h2>
            <hr>
            <small class="badge rounded-pill bg-primary fs-4">Guardian/Parent</small>
            <p class="px-3 fs-5">name of guardian or parent</p>
            <small class="badge rounded-pill bg-primary fs-4">Address</small>
            <p class="px-3 fs-5">Muntinlupa City</p>
            <small class="badge rounded-pill bg-primary fs-4">Emergency Contact</small>
            <p class="px-3 fs-5">09**-***-****</p>
        </div>
    </div>
</div>