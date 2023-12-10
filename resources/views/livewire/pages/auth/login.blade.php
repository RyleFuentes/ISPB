<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();
        Session::regenerate();
        if (Auth::user()->role == 2 && Auth::user()->hasVerifiedEmail()) {
            Auth::guard('web')->logout();

            Session::invalidate();
            Session::regenerateToken();

            $this->redirect('/', navigate: true);
            session()->flash('error', "Wait for admin's confirmation to continue");
        } elseif (!Auth::user()->hasVerifiedEmail()) {
            $this->redirect(RouteServiceProvider::EMAILVERIF, navigate: true);
        } elseif (Auth::user()->role == 1) {
            $this->redirect('products', navigate: true);
            session()->flash('success', 'welcome ' . Auth::user()->name);
        } else {
            # code...

            $this->redirect(RouteServiceProvider::HOME, navigate: true);
        }
    }
};
?>

<div>

    @include('livewire.messages.message')
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mb-4">
        <a href="/" wire:navigate>
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
        <div class="text-center fw-bold mt-4">
            <div class="fs-5">Login to your <span class="text-primary">Account</span></div>
        </div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div class="form-floating mt-2">
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" placeholder="email" />
            <x-input-label for="email" :value="__('Email')" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mt-4">
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" placeholder="password" />
            <x-input-label for="password" :value="__('Password')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center flex-column">
            <x-primary-button wire:loading.remove class="flex items-center justify-center ms-3 mt-3 bg-primary w-100 rounded-pill">
                {{ __('Log in') }}
            </x-primary-button>

            <div wire:loading class="flex gap-2">
                <div class="spinner-grow text-dark mt-3" role="status">

                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-primary mt-3" role="status">

                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-warning mt-3" role="status">

                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center mt-4 flex-column">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <p class="text-sm text-gray-600 rounded-md">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold"
                    wire:navigate>Register</a>
            </p>
        </div>
    </form>
</div>
