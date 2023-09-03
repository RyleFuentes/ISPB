<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Register')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }
}
