<?php

namespace App\Livewire\Forms\Orders;

use App\Models\Order;
use Livewire\Attributes\Rule;
use App\Models\Brand;
use Livewire\Form;
use App\Models\Product;
use Livewire\Attributes\Computed;

class addOrderForm extends Form
{

    // public $orders_array = [
    //     'type_order' =>  '',
    //     'product' => '',
    //     'recipient' => '',
    //     'order_amount' => '',
    //     'deliver_date' => '',
    //     'brandID' => ''

    // ];


    public $mode_order;
  

    #[Rule('required', as: 'Order Type')]
    public $type_order;
    #[Rule('required', as:'Product')]
    public $product;

    #[Rule('required|min:3|max:30', as:'Recipient')]
    public $recipient;

    #[Rule('required', as:'Order Amount')]
    public $order_amount;
 

    public $total_price;

    #[Rule('required|date|after_or_equal:today', as: 'Delivery Date')]
    public $deliver_date;

    #[Rule('required', as :'Brand')]
    public $brandID;

    

    #[Computed()]
    public function brands()
    {
        return Brand::all();
    }

    #[Computed()]
    public function products()
    {
        return Product::where('brandID', $this->brandID)->get();
    }


    public function calculate($type, $prod, $qty)
    {
        $product = Product::findOrFail($prod);

        if ($type === '1') {
            return $product->retail_price * $qty;
        } elseif ($type === '2') {
            return $product->wholesale_price * $qty;
        }

        // Add a default value or handle other cases as needed
        return 0;
    }

    public function store()
    {
        $validated = $this->validate();
        $product = Product::findOrFail($validated['product']);

        $this->total_price = $this->calculate($validated['type_order'], $validated['product'], $validated['order_amount']);

        if ($validated['type_order'] === '1') {

            if ($product->kilo_amount < $product->pendingOrderKilo + $validated['order_amount']) {
                session()->flash('modal_error', 'You have exceeded the amount of kilo to order');
            } elseif ($product->kilo_amount < $validated['order_amount']) {
                session()->flash('modal_error', "Can't exceed current order amount for this product");
            } else {


                $product->orders()->create([
                    'order_kilo' => $validated['order_amount'],
                    'due_date' => $validated['deliver_date'],
                    'recipient' => $validated['recipient'],
                    'total_price' => $this->total_price,
                    'order_type' => $validated['type_order']
                ]);

                session()->flash('modal_success', 'You have added a retail order');
                $this->reset();
            }
        } else {
            if ($product->total_quantity < $product->pendingOrderQuantity + $validated['order_amount']) {
                session()->flash('modal_error', 'The quantity requested exceeds the existing records');
            } elseif ($product->total_quantity < $validated['order_amount']) {
                session()->flash('modal_error', 'Cannot exceed current order quantity for this product');
            } else {
                $product->orders()->create([
                    'order_quantity' => $validated['order_amount'],
                    'due_date' => $validated['deliver_date'],
                    'recipient' => $validated['recipient'],
                    'total_price' => $this->total_price,
                    'order_type' => $validated['type_order']
                ]);

                session()->flash('modal_success', 'You have added a wholesale order');
                $this->reset();
            }
        }
    }
}
