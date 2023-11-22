<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use Livewire\Component;

#[Layout('guest_layout')]
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
                session()->flash('success', 'You have successfully logged in!!'.Auth::user()->name.'');
                return $this->redirect('dashboard', navigate:true);
            } elseif (Auth::user()->role == 1) {
                request()->session()->regenerate();
                session()->flash('success','You have successfullly logged in!!');
                return $this->redirect('products', navigate:true);
            } elseif (Auth::user()->role == 2) {
                // User role is 2 (pending)
                Auth::logout(); // Log the user out
                request()->session()->invalidate(); // Invalidate the session
                request()->session()->regenerateToken(); // Regenerate the CSRF token
    
                //return redirect()->intended('login')->with('error', 'Your account is still pending.');
                session()->flash('error', 'Your account is still pending.');
                return $this->redirect('/', navigate:true);
            }
        }
        else
        {
            return back()->with('error', "This account doesn't exist in our system, try registering");
        }
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
