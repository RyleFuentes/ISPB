<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('index')]
#[Title('Profile')]

class Profile extends Component
{
    public $user;

    public function render()
    {
        $this->user = auth()->user();
        return view('livewire.pages.profile');
    }
}
