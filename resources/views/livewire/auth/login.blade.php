<div class="">
    <div class="container-fluid mt-5  d-flex align-items-center" style="justify-content: space-between">
        <div class="container">
            Hello world
        </div>
        <div class="container rounded p-3" style="background-color: hsl(0, 0%, 0%, .3)">
            <h3 class='text-center'>LOGIN</h3>
            <form wire:submit='authenticate' class="form">
                
                <div class="form-floating mt-3">
                    <input type="text" wire:model='email' id="email" placeholder="name" class="form-control">
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

                <div class="form-group  mt-3">
                    <button class="btn w-100 btn-outline-dark">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
