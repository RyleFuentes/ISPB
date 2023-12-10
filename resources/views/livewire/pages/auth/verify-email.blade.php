<?php

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            if (Auth::user()->role == 2) {
                Auth::guard('web')->logout();

                Session::invalidate();
                Session::regenerateToken();
                $this->redirect('/', navigate: true);
                session()->flash('success', "You have successfully verified your account, please wait for admin's confirmation to continue");
            }
            else {
                # code...
                $this->redirect(session('url.intended', RouteServiceProvider::HOME), navigate: true);
            }

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <x-primary-button wire:loading.remove wire:click="sendVerification">
            {{ __('Resend Verification Email') }}
        </x-primary-button>
        <div wire:loading class="flex gap-2">
            <div  class="spinner-grow text-dark mt-3" role="status">
                
                <span class="visually-hidden">Loading...</span>
              </div>
              <div  class="spinner-grow text-primary mt-3" role="status">
                
                <span class="visually-hidden">Loading...</span>
              </div>
              <div  class="spinner-grow text-warning mt-3" role="status">
                
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>

        <button wire:click="logout" type="submit"
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Log Out') }}
        </button>
    </div>
</div>
