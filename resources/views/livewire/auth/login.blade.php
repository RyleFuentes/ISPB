<div class="container d-flex justify-content-center align-items-center flex-column min-vh-100">

    @if(session('error'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">ISPB</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">{{ session('error') }}</div>
        </div>
    @endif

    <script>
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>

    <div class="row border d-flex justify-content-center align-items-center flex-column rounded-3 shadow p-3 p-md-5" style="width: 90vw; max-width: 400px">
        <div class="text-center fw-bold">
            <img src="images/logo.png" width="100" class="mb-3 img-fluid">
            <div class="fs-6 text-secondary">Welcome</div>
            <div class="fs-5">Login to your <span class="text-primary">Account</span></div>
        </div>

        <form wire:submit='authenticate' style="width: 100%">
                            
            <div class="form-floating mt-3">
                <input type="text" wire:model='email' id="email" placeholder="name" class="form-control fs-6">
                <label for="email">Email</label>
            </div>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-floating mt-3">
                <input type="password" wire:model='password' id="password" placeholder="name" class="form-control">
                <label for="password">Password</label>
            </div>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-group mt-3">
                <button class="btn btn-primary w-100 rounded-pill fw-semibold">Login</button>
            </div>
        </form>
    </div>
    
    <div class="text-center mt-3">
        <p class="text-secondary">Don't have an account? <a href="/register" class="text-primary text-decoration-none fw-semibold">Register</a></p>
    </div>
</div>
