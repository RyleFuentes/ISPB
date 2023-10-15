<?php

namespace App\Livewire\Pages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('index')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    
    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
