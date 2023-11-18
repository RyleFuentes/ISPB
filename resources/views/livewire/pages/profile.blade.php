<div class="d-flex" id="wrapper">
    @include('layout.sidebar')
    <div class="container-fluid px-4" id="dashboard">
        @include('layout.navbar')



        
       

        @if ($editing === false && $change_pass === false && $change_profile_image === false)
            <div class="p-3 d-flex justify-content-end">
                
                <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='toggle_change_password'>
                    <i class="fa fa-gear me-2 text-primary"></i>Change Password
                </button>

                <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='edit_profile'>
                    <i class="fa fa-gear me-2 text-primary"></i>Edit Profile
                </button>
            </div>
        @endif

        



        @include('livewire.components.profile_information')

        @include('livewire.messages.message')

    </div>
</div>
