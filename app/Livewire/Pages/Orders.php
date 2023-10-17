<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('index')]
#[Title('Orders')]
class Orders extends Component
{
    public $product_quantity;


    public $change_page = 1;

    public function toggle_on()
    {
        $this->change_page = 2;
    }   

    public function toggle_off()
    {
        $this->change_page = 1;
    }   

    public function render()
    {
        $products = Product::all();
        return view('livewire.pages.orders', compact('products'));
    }
}
