<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\Orders\addOrderForm;
use App\Models\Brand;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('index')]
#[Title('Orders')]
class Orders extends Component
{

    public $products;


    public function mount(){
        $this->products = collect();
    }
    public addOrderForm $add_order;


    
    public function submit_order()
    {
        $this->add_order->store();
    }


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

    public function updateProducts()
    {
       
        if ($this->add_order->brand) {
            // get the products for the selected brand
            $this->products = Product::where('brandID', $this->add_order->brand)->get();
        } else {
            // reset the products and product value
            $this->products = collect();
            $this->add_order->product = null;
        }
    }

    public function render()
    {
        $brands = Brand::all();
        $orders = Order::all();
        $data = compact('brands', 'orders');
       
    
        return view('livewire.pages.orders', $data);
    }
}
