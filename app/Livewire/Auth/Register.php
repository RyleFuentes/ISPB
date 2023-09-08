<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Register')]
class Register extends Component
{

    #[Rule('required|max:50')]
    public $name ='';
    #[Rule('required|email|unique:users')]
    public $email ='';
    #[Rule('required|confirmed')]
    public $password ='';
    #[Rule('required')]
    public $password_confirmation ='';

    public function register()
    {
        $validated = $this->validate(
        );




    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
