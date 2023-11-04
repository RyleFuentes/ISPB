<div class="row">
    <!-- ala pa ako maisip na ilagay, lakas ng mental block -->
    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-3 bg-opacity-25 w-100 h-100">
            <div class="d-flex align-items-center justify-content-center py-1">
                <div class="prof rounded bg-primary bg-opacity-25">
                    <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}" alt="logo">
                </div>
            </div>
            <hr>
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

    <div class="col-md-7 mt-3 d-flex justify-content-center">
        <div class="bg-primary rounded p-5 bg-opacity-25 w-100 h-100">
            <h2 class="fs-2 fs-sm-2 text-primary">BASIC INFO</h2>
            <hr />
            <small class="badge rounded-pill bg-primary fs-6">Email</small>
            <p class="px-3 fs-5">{{ $user->email }}</p>
            <small class="badge rounded-pill bg-primary fs-6">Address</small>
            <p class="px-3 fs-5">Muntinlupa City</p>
            <small class="badge rounded-pill bg-primary fs-6">Contact</small>
            <p class="px-3 fs-5">09**-***-****</p>
        </div>
    </div>

    <div class="my-3 d-flex justify-content-center">
        <div class="bg-primary rounded p-5 bg-opacity-25 w-100">
            <h2 class="fs-2 text-primary">IN CASE OF EMERGENCY</h2>
            <hr>
            <small class="badge rounded-pill bg-primary fs-6">Guardian/Parent</small>
            <p class="px-3 fs-5">name of guardian or parent</p>
            <small class="badge rounded-pill bg-primary fs-6">Address</small>
            <p class="px-3 fs-5">Muntinlupa City</p>
            <small class="badge rounded-pill bg-primary fs-6">Emergency Contact</small>
            <p class="px-3 fs-5">09**-***-****</p>
        </div>
    </div>
    
</div>