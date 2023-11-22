<?php

namespace App\Livewire\Components;

use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.components.logout');
    }
}
