<div class="row">
    
    <!-- ala pa ako maisip na ilagay, lakas ng mental block -->
    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-3 bg-opacity-25 w-100 h-100">
            <div class="d-flex align-items-center justify-content-center py-1">
                <div class="prof rounded bg-primary bg-opacity-25">
                    <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}"
                        alt="logo">
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
                <p class="fs-5"><i class="bi bi-geo-alt-fill text-primary"></i>
                    {{ $user->profile->address ?? 'Not Set' }}</p>

                <h4 class="fw-bold mb-0 fs-5">Contact</h4>
                <p class="fs-5 mb-0"><i class="bi bi-telephone-fill text-primary"></i>
                    {{ $user->profile->number ?? 'Not Set' }}</p>
            </div>

            <div class="mt-5">
                <button wire:click='edit_profile' class="btn btn-outline-dark">Edit Information</button>
            </div>
        </div>
    </div>

    @if ($editing === true)
        <div class="my-3 d-flex justify-content-center">

            <div class="bg-primary rounded p-2 p-sm-3 p-md-4 p-lg-5 bg-opacity-25 w-100">
                <div class="d-flex" style="justify-content: space-between">
                    <h2 class="fs-2 text-primary">EDIT INFORMATION</h2>
                    <button wire:click='unedit_profile' type="button" class="btn-close"></button>
                </div>

                <hr class="border border-3 rounded border-primary">

                <div class="px-3">
                    <form wire:submit='update_profile'>
                        <div class="form-group mt-3">

                            <h4 class="fw-bold mb-0 fs-5">Name</h4>
                            <input wire:model='update_name' type="text" class="form-control">
                        </div>

                        @error('update_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">

                            <h4 class="fw-bold mb-0 fs-5">Address</h4>
                            <input wire:model='update_address' type="text" class="form-control">
                        </div>

                        @error('update_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">

                            <h4 class="fw-bold mb-0 fs-5">Contact Information</h4>
                            <input type="number" class="form-control" wire:model='update_number'>
                        </div>

                        @error('update_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">

                            <h4 class="fw-bold mb-0 fs-5">Date of Birth</h4>
                            <input type="date" class="form-control" wire:model='update_dateOfBirth'>
                        </div>

                        @error('update_dateOfBirth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>
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
    @endif



    @include('livewire.messages.message')

</div>
