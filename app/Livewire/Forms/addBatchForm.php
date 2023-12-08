<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use App\Models\Product;
use Livewire\Form;

class addBatchForm extends Form
{
    
    #[Rule('required')]
    public $quantity;
    #[Rule('required|date')]
    public $expiration_date;

    public function add_new_batch($product_id)
    {
        $validated = $this->validate();
        $product = Product::findOrFail($product_id);

        $store = $product->batch()->create([
            'expiration_date' => $validated['expiration_date'],
            'quantity' => $validated['quantity'],
        ]);


        if($store)
        {
            session()->flash('success', 'You have successfully added a new batch for this product');
            $this->reset('quantity', 'expiration_date');
        }
    }
}
