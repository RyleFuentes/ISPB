<div class="container d-flex justify-content-center align-items-center flex-column min-vh-100">
    <div class="row border d-flex justify-content-center align-items-center flex-column rounded-3 shadow p-3 p-md-5" style="width: 90vw; max-width: 400px">
        <div class="text-center fw-bold">
            <img src="images/logo.png" width="100" class="mb-3 img-fluid">
            <div class="fs-5">Create your <span class="text-primary">account</span></div>
        </div>

        <form wire:submit='register' style="width: 100%">
            <div class="form-floating mt-3">
                <input type="text" wire:model.live='name' id="Name" placeholder="name" class="form-control">
                <label for="name">
                    Name
                </label>
            </div>
            @error('name')
            <span class="error text-danger">{{$message}}</span>
            @enderror
            <div class="form-floating mt-3">
                <input type="email" id="email" wire:model.live='email' placeholder="user@mail.com" class="form-control">
                <label for="email">Email</label>
            </div>
            @error('email')
            <span class="error text-danger">{{$message}}</span>
            @enderror

            <div class="form-floating mt-3 flex-fill pe-1">
                <input type="password" id="password" wire:model.live='password' placeholder="" class="form-control">
                <label for="password">Password</label>
            </div>
            @error('password')
                <span class="text-danger error">{{$message}}</span>
            @enderror

            <div class="form-floating mt-3 ps-1">
                <input type="password" wire:model.live='password_confirmation' id="pass_con" placeholder="" class="form-control">
                <label for="pass_con">Confirm Password</label>
            </div>
            @error('password_confirmation')
                <span class="error text-danger">{{$message}}</span>
            @enderror

            <div class="form-group mt-3">
                <button class="btn btn-primary w-100 rounded-pill fw-semibold">Register</button>
            </div>
        </form>
    </div>
    
    <div class="text-center mt-3">
        <p class="text-secondary">Already have an account? <a wire:navigate href="/" class="text-primary text-decoration-none fw-semibold">Login</a>
        </p>
    </div>
</div>


