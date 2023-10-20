<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('index')]
#[Title('Login')]
class Login extends Component
{

    #[Rule('required|email')]
    public $email = '';
    #[Rule('required')]
    public $password = '';

    public function authenticate()
    {
        $validated = $this->validate();
    
        if (Auth::attempt($validated)) {
            if (Auth::user()->role == 0) {
                request()->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'You have successfully logged in');
            } elseif (Auth::user()->role == 1) {
                request()->session()->regenerate();
                return redirect()->route('products')->with('success', 'You have successfully logged in');
            } elseif (Auth::user()->role == 2) {
                // User role is 2 (pending)
                Auth::logout(); // Log the user out
                request()->session()->invalidate(); // Invalidate the session
                request()->session()->regenerateToken(); // Regenerate the CSRF token
    
                return redirect()->route('login')->with('error', 'Your account is still pending.');
            }
        }
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
