<div class="">
    <div class="d-flex shadow-lg" style="justify-content: space-between; flex-direction:row-reverse">
        <div class="container rounded p-5 border border-dark border-start-0 text-light" style="backdrop-filter: blur(7px); height: 70vh;">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore nam maxime harum? Soluta iure doloribus dolores minima est cum accusamus quibusdam inventore cupiditate reprehenderit, molestias nobis dolorem excepturi, corrupti hic.</p>
        </div>
        <div class="container rounded p-5 border border-dark border-end-0 d-flex flex-column justify-content-center align-content-center" style="backdrop-filter: blur(7px); height: 70vh;">
            <h3 class='text-light display-2'>R<small>EGISTER</small></h3>
            <br>
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
                    <input type="password" wire:model.live='password_confirmation' id="pass_con" placeholder="" class="form-control bg-primary text-white">
                    <label for="pass_con">Confirm Password</label>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group  mt-3">
                    <button class="btn w-100 btn-outline-light text-light">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
