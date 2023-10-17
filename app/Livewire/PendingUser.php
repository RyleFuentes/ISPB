<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Gate;

#[Layout('index')]
#[Title('Pending')]
class PendingUser extends Component
{
   

    public function render()
    {
       
        

        return view('livewire.pending-user');
    }
}
