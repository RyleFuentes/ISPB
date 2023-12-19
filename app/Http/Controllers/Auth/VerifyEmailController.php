<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
      

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            // session()->flash('success', 'Your email has been verified!, welcome '.Auth::user()->name);

        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Check user role
        if ($request->user()->role != 0 && $request->user()->role != 1) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'You do not have permission to access this application.');
        }

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
