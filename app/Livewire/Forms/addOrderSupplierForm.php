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
    #[Rule('required|min:3|max:50|regex:/^[^0-9]/', as:"Product")]
    public $prod_name;
    #[Rule('required|numeric', as:"Quantity")]
    public $quantity;
    #[Rule('required|date|after:today', as:"Delivery Date")]
    public $deliver_date;

    protected $messages = [
        'prod_name.required' => 'The product name is required.',
        'prod_name.min' => 'The product name must be at least :min characters.',
        'prod_name.max' => 'The product name may not be greater than :max characters.',
        'prod_name.regex' => 'The product name must not start with a number.',

        'quantity.required' => 'The quantity is required.',
        'quantity.numeric' => 'The quantity must be a number.',

        'deliver_date.required' => 'The delivery date is required.',
        'deliver_date.date' => 'Invalid date format for the delivery date.',
        'deliver_date.after' => 'The delivery date must be a date after today.',
    ];

    public function store($suppID)
    {
        
        $supplier = Supplier::findOrFail($suppID);
        $validated = $this->validate();

        $store = $supplier->supplier_orders()->create([
            'prod_name' => $validated['prod_name'],
            'quantity' => $validated['quantity'],
            'delivery_date' => $validated['deliver_date'],
            
        ]);

        Mail::to($supplier->supplier_email)->send(new OrderEmail($supplier));

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
