<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Products extends Component
{
    public $brand='';

    public function addBrand()
    {
        $validated = $this->validate([
            'brand' => 'required'
        ]);
        

    }


    public function render()
    {
        return view('livewire.pages.products');
    }
}
