<?php

namespace App\Livewire\Forms;

use App\Models\SupplierOrder;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use App\Models\Supplier;
use Livewire\Form;

class addOrderSupplierForm extends Form
{
    #[Rule('required|min:3|max:50', as:"Product")]
    public $prod_name;
    #[Rule('required|numeric', as:"Quantity")]
    public $quantity;
    #[Rule('required|date', as:"Delivery Date")]
    public $date;

    public function store($id)
    {
        
        $supplier = Supplier::findOrFail($id);
        $validated = $this->validate();

        $store = $supplier->supplier_orders()->create([
            'prod_name' => $validated['prod_name'],
            'quantity' => $validated['quantity'],
            'delivery_date' => $validated['date'],
        ]);

        if($store)
        {
            session()->flash('modal_success', 'You have successfully added a new order');
            $this->reset();
        }
        else
        {
            session()->flash('modal_error', 'Something went wrong...');
        }
    }
}
