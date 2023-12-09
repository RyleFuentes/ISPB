<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component 
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>

    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mb-4">
        <a href="/" wire:navigate>
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
        <div class="text-center fw-bold mt-4">
            <div class="fs-5">Create your <span class="text-primary">account</span></div>
        </div>
    </div>
    <form wire:submit="register">
        <!-- Name -->
        <div class="form-floating mt-2">
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                required autofocus autocomplete="name" placeholder="name" />
            <x-input-label for="name" :value="__('Name')" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-floating mt-3">
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" placeholder="email" />
            <x-input-label for="email" :value="__('Email')" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mt-3">

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" placeholder="password" />
            <x-input-label for="password" :value="__('Password')" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-floating mt-3">

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="password_confirmation" />
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center flex-column">
            <x-primary-button class="flex items-center justify-center ms-3 mt-3 bg-primary w-100 rounded-pill">
                {{ __('Register') }}
            </x-primary-button>
        </div>


        <div class="flex items-center justify-center mt-4">

            <p class="text-sm text-gray-600 rounded-md">
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold"
                    wire:navigate>Login</a>
            </p>
        </div>  
    </form>
</div>
