<?php

namespace App\Livewire\Forms\Orders;

use App\Models\Order;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;
class addOrderForm extends Form
{


    
    #[validate('required')]
    public $brand;

    #[Validate('required')]
    public $type_order;
    
    #[validate('required')]
    public $product;

    #[validate('required|min:3|max:30')]
    public $recipient;

    #[validate('required')]
    public $order_qty;


    public $total_price;

    #[validate('required|date')]
    public $deliver_date;

   

 

    public function store()
    {
        $validated = $this->validate();
        $product = Product::findOrFail($validated['product']);
        $store = $product->orders()->create([
            'order_quantity' => $validated['order_qty'],
            'due_date' => $validated['deliver_date'],
            'recipient' => $validated['recipient'],

        ]);

        if($store)
        {
            session()->flash('success','well done success');
        }
    }
}
