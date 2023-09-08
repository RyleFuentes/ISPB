<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.app')]
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
            request()->session()->regenerate();
            return $this->redirect('dashboard', navigate:true);
        }
        
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
