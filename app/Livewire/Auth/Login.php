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
    public $email ='';
    #[Rule('required')]
    public $password ='';

    public function authenticate()
    {
        $validated = $this->validate();

        if(Auth::attempt($validated))
        {
            if(Auth::user()->role == 0)
            {
                request()->session()->regenerate();
            return redirect()->route('dashboard');
            }
            elseif(Auth::user()->role == 1)
            {
                request()->session()->regenerate();
            return redirect()->route('products');
            }
            else
            {
                request()->session()->regenerate();
            return redirect()->route('pending');
            }
            
        }
        
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
