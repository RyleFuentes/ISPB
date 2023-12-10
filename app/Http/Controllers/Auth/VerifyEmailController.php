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
      

            if ($request->user()->hasVerifiedEmail() ) {
                Auth::guard('web')->logout();

                Session::invalidate();
                Session::regenerateToken();
                return redirect()->route('login')->with('success', 'You have verified your email');
            }
    
            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }
    
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
}
