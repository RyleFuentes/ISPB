<div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
    <div class="rounded shadow-lg h-50 p-5" style="width: 80%;">
        <div class="row g-5 d-flex align-items-center justify-content-center">
            <div class="col col-md-6">
                <div class="text-end">
                    <h1 class="fw-bold">KHIM <br>EBRAM'S</h1>
                    <p>Inventory System for Poultry Business</p>
                </div>
            </div>
            <div class="col col-md-6">
                <div>
                    <h3 class='text-dark fw-bold'>LOGIN</h3>         
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
                            <button class="btn w-100 btn-dark text-light">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
