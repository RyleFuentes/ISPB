<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.components.logout');
    }
}
