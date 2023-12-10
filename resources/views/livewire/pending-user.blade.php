

<div class="container d-flex justify-content-center align-items-center flex-column min-vh-100">

    <div>
        <img src="images/logo.png" class="img-fluid" width="500px">
        <h1 class="fs-6">Your account is still pending, wait for the admin's confirmation to continue.</h1>
        <button wire:click="logout" class="w-full text-start">
           
                <i class="fas fa-sign-out me-3"></i>
                {{ __('LOG OUT') }}
            
        </button>
    </div>
</div>
