<div class="">
    <div class="container-fluid mt-5  d-flex align-items-center" style="justify-content: space-between; flex-direction:row-reverse">
        <div class="container text-center">
            Hello world
        </div>
        <div class="container p-3 rounded" style="background-color: hsl(0, 0%, 0%, .3)">
            <h3 class='text-center'>Register</h3>
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
                <div class="form-floating mt-3">
                    <input type="password" id="password" wire:model.live='password' placeholder="" class="form-control">
                    <label for="password">Password</label>
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="form-floating mt-3">
                    <input type="password" wire:model.live='password_confirmation' id="pass_con" placeholder="" class="form-control">
                    <label for="pass_con">Confirm Password</label>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group  mt-3">
                    <button class="btn w-100 btn-outline-dark">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
