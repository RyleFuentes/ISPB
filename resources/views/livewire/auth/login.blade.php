<div class="" style="">
    <div class="d-flex shadow-lg">
        <div class="container rounded p-5 border border-dark border-end-0 text-light" style="backdrop-filter: blur(5px); height: 50vh;">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur architecto doloribus, perspiciatis fuga incidunt repellat earum accusamus, ab cumque tempora maiores sit quibusdam exercitationem aperiam accusantium. Delectus eaque tempora pariatur.</p>
        </div>
        <div class="container rounded p-5 border border-dark border-start-0 d-flex flex-column justify-content-center align-content-center" style="backdrop-filter: blur(5px); height: 50vh;">
            <h3 class='text-center text-light'>LOGIN</h3>
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

                <div class="form-group mt-3">
                    <button class="btn w-100 btn-outline-dark text-light">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
