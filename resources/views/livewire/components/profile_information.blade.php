<div class="row">

    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-3 bg-opacity-25 w-100 h-100">
            @if ($editing === true)
                <form wire:submit='update_profile'>
                    <div class="d-flex align-items-center justify-content-center py-1">
                        <div class="prof rounded bg-primary bg-opacity-25">
                            <img class="img prof rounded border border-3 border-light"
                                src="{{ asset('images/bean.jpg') }}" alt="logo">
                        </div>
                    </div>
                    <hr class="border border-3 rounded border-primary">
                    <div>
                        <div class="form-group mt-3 mb-0">
                            <h4 class="fw-bold mb-0 fs-5">Name</h4>
                            <input wire:model='update_name' type="text"
                                class="form-control bg-primary bg-opacity-50 text-light">
                        </div>
                        @error('update_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if ($user->role == 0)
                            <p class="fs-6 text-center mb-0">Admin</p>
                        @else
                            <p class="fs-6 text-center mb-0">Inventory Clerk</p>
                        @endif
                    </div>
                </form>
            @else
                <!-- <div class="d-flex align-items-center justify-content-center py-1">
                    <div class="prof rounded bg-primary bg-opacity-25">
                        <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}"
                            alt="logo">
                        <i class="bi bi-camera-fill bg-primary" style="z-index: 99;"></i>
                    </div>
                </div> -->

                <div class="d-flex align-items-center justify-content-center py-1">
                    <div class="prof rounded bg-primary bg-opacity-25 position-relative">
                        <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}" alt="logo">
                        <button class="btn position-absolute bottom-0 end-0" style="z-index: 99;">
                            <i class="bi bi-camera-fill text-light rounded-circle bg-primary py-1 px-2 fs-3"></i>
                        </button>
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
            @endif
        </div>
    </div>

    <div class="col-md-7 mt-3 mt-md-0 d-flex justify-content-center">
        <div class="bg-primary rounded p-2 p-sm-3 p-md-4 p-lg-5 bg-opacity-25 w-100 h-100">
            @if ($editing == true)
                <div class="d-flex" style="justify-content: space-between">
                    <h2 class="fs-2 fs-sm-2 text-white">EDIT INFORMATION</h2>
                    <button wire:click='unedit_profile' type="button" class="btn-close btn-danger"></button>
                </div>

                <hr class="border border-3 rounded border-primary">

                <form wire:submit='update_profile'>
                    <div class="px-3">
                        <h4 class="fw-bold mb-0 fs-5">Email</h4>
                        <p class="fs-5"><i class="bi bi-envelope-at-fill text-primary"></i> {{ $user->email }}</p>

                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">Address</h4>
                            <input wire:model='update_address' type="text"
                                class="form-control  bg-primary bg-opacity-50 text-light">
                        </div>
                        @error('update_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">Contact Information</h4>
                            <input type="number" class="form-control bg-primary bg-opacity-50 text-light"
                                wire:model='update_number'>
                        </div>
                        @error('update_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">Date of Birth</h4>
                            <input type="date" class="form-control bg-primary bg-opacity-50 text-light"
                                wire:model='update_dateOfBirth'>
                        </div>
                        @error('update_dateOfBirth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            @elseif($change_pass == true)
                <div class="d-flex" style="justify-content: space-between">
                    <h2 class="fs-2 fs-sm-2 text-white">CHANGE PASSWORD</h2>
                    <button wire:click='cance_change_pass' type="button" class="btn-close btn-danger"></button>
                </div>

                <hr class="border border-3 rounded border-primary">

                <div class="px-3">
                    <form wire:submit='update_password'>
                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">Old Password</h4>
                            <input type="password" class="form-control bg-primary bg-opacity-50 text-light" wire:model='old_password'>
                        </div>

                        @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">Confirm Old Password</h4>
                            <input type="password" class="form-control bg-primary bg-opacity-50 text-light" wire:model='old_password_confirmation'>
                        </div>

                        @error('old_password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-3">
                            <h4 class="fw-bold mb-0 fs-5">New Password</h4>
                            <input type="password" class="form-control bg-primary bg-opacity-50 text-light" wire:model='new_password'>
                        </div>
                        @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="form-group mt-3 d-flex justify-content-end">
                            <button class="btn btn-primary" >Update Password</button>
                        </div>
                    </form>
                </div>
            @else
                <h2 class="fs-2 fs-sm-2 text-primary">BASIC INFO</h2>

                <hr class="border border-3 rounded border-primary">

                <div class="px-3">
                    <h4 class="fw-bold mb-0 fs-5">Email</h4>
                    <p class="fs-5"><i class="bi bi-envelope-at-fill text-primary"></i> {{ $user->email }}</p>

                    <h4 class="fw-bold mb-0 fs-5">Address{!! isset($user->profile->address) ? '' : ' <span class="text-danger">*</span> ' !!}</h4>
                    <p class="fs-5"><i class="bi bi-geo-alt-fill text-primary"></i>
                        {{ $user->profile->address ?? 'Not Set' }}</p>

                    <h4 class="fw-bold mb-0 fs-5">Contact{!! isset($user->profile->number) ? '' : ' <span class="text-danger">*</span> ' !!}</h4>
                    <p class="fs-5"><i class="bi bi-telephone-fill text-primary"></i>
                        {{ $user->profile->number ?? 'Not Set' }}</p>

                    <h4 class="fw-bold mb-0 fs-5">Birth Date{!! isset($user->profile->birth_of_date) ? '' : ' <span class="text-danger">*</span> ' !!}</h4>
                    <p class="fs-5 mb-0"><i class="bi bi-calendar-event-fill text-primary"></i>
                        {{ $user->profile->date_of_birth ?? 'Not Set' }}</p>
                </div>
            @endif
        </div>
    </div>


</div>
