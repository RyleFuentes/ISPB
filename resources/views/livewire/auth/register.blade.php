<div class="container d-flex justify-content-center align-items-center flex-column min-vh-100">

    <img src="images/logo.png" width="100" class="mb-3 img-fluid">

    <div class="border flex-column w-50 rounded-5 shadow p-5  align-items-center" >
        <div class="text-start fw-bold">
            <div class="fs-3 text-primary">Create account</div>
        </div>

        <form wire:submit='register'class="form">
            <div class="form-floating mt-3">
                <input type="text" wire:model.live='name' id="Name" placeholder="name" class="form-control">
                <label for="name">Name</label>
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-floating mt-3">
                <input type="email" id="email" wire:model.live='email' placeholder="user@mail.com" class="form-control">
                <label for="email">Email</label>
            </div>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-floating mt-3 flex-fill pe-1">
                <input type="password" id="password" wire:model.live='password' placeholder="" class="form-control">
                <label for="password">Password</label>
            </div>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-floating mt-3 ps-1">
                <input type="password" wire:model.live='password_confirmation' id="pass_con" placeholder="" class="form-control">
                <label for="pass_con">Confirm Password</label>
            </div>
            @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-group mt-3">
                <button class="btn btn-primary w-100 rounded-pill fw-semibold">Register</button>
            </div>
        </form>
    </div>
    
    <div class="text-center mt-3">
        <p class="text-secondary">Already have an account? <a href="/" class="text-primary text-decoration-none fw-semibold">Login</a>
        </p>
    </div>
</div>


