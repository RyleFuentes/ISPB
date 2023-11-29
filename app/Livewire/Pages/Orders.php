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
    public addOrderForm $add_order;
    public $product_quantity;
    public $change_page = 1;

    public function mount()
    {
        $this->products = collect();
    }



    public function submit_order()
    {
        $this->add_order->store();
    }

    public function completeOrder(Order $order)
    {
        if ($order->status === 0) 
        {
            $product = $order->product;
            $order_qty = $order->order_quantity;

            $batches = $product->batch()->orderBy('expiration_date', 'asc')->get();
            $remaining_qty = $order_qty;

            foreach ($batches as $batch) {
                $quantityToDeduct = min($remaining_qty, $batch->quantity);

                // Update the batch quantity
                $batch->update(['quantity' => $batch->quantity - $quantityToDeduct]);

                // TODO: Save information to Orders table
                // You need to decide how to store the order information in your Orders table
                // For example, you might have a pivot table that links orders to batches.

                $remaining_qty -= $quantityToDeduct;

                if ($remaining_qty <= 0) {
                    break;
                    
                }
            }
            $order->update(['status' => 1]);
            session()->flash('success', 'you have successfully completed the order !');
        }
        else
        {
            session()->flash('error','This order has been completed');
        }
    }


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
