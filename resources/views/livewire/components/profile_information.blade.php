<div class="row">

    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="bg-primary rounded py-3 px-3 bg-opacity-25 w-100 h-100">

            <div class="d-flex align-items-center justify-content-center py-1">
                <div class="prof rounded bg-primary bg-opacity-25 position-relative">
                    @if ($user->profile->profile_image)
                        <img class="img prof rounded border border-3 border-light"
                            src="{{ Storage::url($user->profile->profile_image) }}" alt="Profile Image">
                    @else
                        <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}"
                            alt="Default Image">
                    @endif
                    <button wire:click='change_image' class="btn position-absolute bottom-0 end-0" style="z-index: 99;">
                        <i class="bi bi-camera-fill text-light rounded-circle bg-primary py-1 px-2 fs-3"></i>
                    </button>
                </div>
            </div>

            @if ($editing === true)

                <hr class="border border-3 rounded border-primary">
                <form wire:submit='update_profile'>
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

                {{-- <div class="d-flex align-items-center justify-content-center py-1">
                    <div class="prof rounded bg-primary bg-opacity-25 position-relative">
                        <img class="img prof rounded border border-3 border-light" src="{{ asset('images/bean.jpg') }}" alt="logo">
                        <button wire:click='change_image' class="btn position-absolute bottom-0 end-0" style="z-index: 99;">
                            <i class="bi bi-camera-fill text-light rounded-circle bg-primary py-1 px-2 fs-3"></i>
                        </button>
                    </div>
                </div> --}}

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


    {{-- I separated the view for the edit info and password here, to make the code a bit shorter --}}
    @include('livewire.components.editInfo_changePass_component')

</div>
