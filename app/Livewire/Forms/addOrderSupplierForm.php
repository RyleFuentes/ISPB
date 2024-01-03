<?php

namespace App\Livewire\Forms;

use App\Mail\OrderEmail;
use App\Models\SupplierOrder;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use App\Models\Supplier;
use Illuminate\Support\Facades\Mail;
use Livewire\Form;

class addOrderSupplierForm extends Form
{
    #[Rule('required|min:3|max:50', as:"Product")]
    public $prod_name;
    #[Rule('required|numeric', as:"Quantity")]
    public $quantity;
    #[Rule('required|date', as:"Delivery Date")]
    public $deliver_date;

    public function store($suppID)
    {
        
        $supplier = Supplier::findOrFail($suppID);
        $validated = $this->validate();

        $store = $supplier->supplier_orders()->create([
            'prod_name' => $validated['prod_name'],
            'quantity' => $validated['quantity'],
            'delivery_date' => $validated['deliver_date'],
        ]);

        // Mail::to($supplier->supplier_email)->send(new OrderEmail($store));

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
