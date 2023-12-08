<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\Orders\addOrderForm;
use App\Models\Brand;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Orders')]
class Orders extends Component
{

    use WithPagination;


    public $products;
    public addOrderForm $add_order;
    public $product_quantity;
    public $change_page = 1;
    public $toggle_input;

    //! lifecycle hook for when add_order->brandID is updated/changed
    public function updatedAddOrderBrandID()
    {
        $this->add_order->product = null;
    }

    public function updatedAddOrderTypeOrder()
    {
        if($this->add_order->type_order == 1)
        {
            $this->toggle_input = 1;
        }
        else
        {
            $this->toggle_input = 2;
        }
    }



    public function submit_order()
    {
        $this->add_order->store();
    }

    public function completeOrder(Order $order)
    {
        if ($order->status === 0) {
            if ($order->order_type === 1) 
            {
                $newKilo = $order->product->kilo - $order->order_kilo;
                $order->product->update([
                    'kilo' => $newKilo
                ]);
                
            } 
            else 
            {
                $product = $order->product;
                $order_qty = $order->order_quantity;

                $batches = $product->batch()->orderBy('expiration_date', 'asc')->get();
                $remaining_qty = $order_qty;

                foreach ($batches as $batch) {
                    $quantityToDeduct = min($remaining_qty, $batch->quantity);

                    // Update the batch quantity
                    $batch->update(['quantity' => $batch->quantity - $quantityToDeduct]);
                    if ($batch->quantity === 0) {
                        // Delete the batch from the database
                        $batch->delete();
                    }
                    // TODO: Save information to Orders table
                    // You need to decide how to store the order information in your Orders table
                    // For example, you might have a pivot table that links orders to batches.

                    $remaining_qty -= $quantityToDeduct;

                    if ($remaining_qty <= 0) {
                        break;
                    }
                }
            }

            $order->update(['status' => 1]);
            session()->flash('success', 'you have successfully completed the order !');
        } else {
            session()->flash('error', 'This order has been completed');
        }
    }

    public function cancelOrder(Order $order)
    {
        $update = $order->update(['status' => 2]);

        if ($update) {
            session()->flash('success', 'You have cancelled the order');
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

        if ($this->add_order->brandID) {
            // get the products for the selected brand
            $this->products = Product::where('brandID', $this->add_order->brandID)->get();
        } else {
            // reset the products and product value
            $this->products = collect();
            $this->add_order->product = null;
        }
    }

    public function render()
    {
       
        $pending_orders = Order::where('status', 0)->paginate(10);
        $completed_orders = Order::whereIn('status', [1, 2])->latest()->paginate(10);
        $data = compact( 'pending_orders', 'completed_orders');



        return view('orders', $data);
    }
}
