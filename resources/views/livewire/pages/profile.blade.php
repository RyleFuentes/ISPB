<div class="d-flex" id="wrapper">
     @include('layout.sidebar')
     <div class="container-fluid px-4" id="dashboard">
         @include('layout.navbar')
        <div class="p-3 d-flex justify-content-end">
            <button class="btn btn-light btn-sm rounded-pill me-2">
                <i class="fa fa-gear me-2 text-primary"></i>Edit Profile
            </button>
        </div>
        
        @include('livewire.components.profile_information')

    </div>
 </div>

