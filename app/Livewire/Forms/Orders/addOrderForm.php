<?php

namespace App\Livewire\Forms\Orders;

use App\Models\Order;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;
class addOrderForm extends Form
{


    
    #[Rule('required')]
    public $brand;

    #[Rule('required')]
    public $type_order;
    
    #[Rule('required')]
    public $product;

    #[Rule('required|min:3|max:30')]
    public $recipient;

    #[Rule('required')]
    public $order_qty;


    public $total_price;

    #[Rule('required|date')]
    public $deliver_date;

   

 

    public function store()
    {
        $validated = $this->validate();
        $product = Product::findOrFail($validated['product']);
        if($product->total_quantity < $validated['order_qty'])
        {
            session()->flash('error_modal','The quantity requested exceeds the existing records');
        }
        else
        {

            $product->orders()->create([
                'order_quantity' => $validated['order_qty'],
                'due_date' => $validated['deliver_date'],
                'recipient' => $validated['recipient'],
    
            ]);

            session()->flash('success','well done success');
        }

       
    }
}
