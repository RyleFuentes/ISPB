<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
class AddSupplierForm extends Form
{
    #[Rule('required|min:3|max:30', as:'Supplier Name')]
    public $name;
    #[Rule('required|email|unique:users,email')]
    public $email;

    public function store()
    {
        $validated = $this->validate();
        $store = Supplier::create([
            'supplier_name' => $validated['name'],
            'supplier_email' => $validated['email'],
        ]);
        if($store)
        {
            $this->reset('name', 'email');
            return back()->with('modal_success','you have added a new supplier');
        }
        else
        {
            return back()->with('modal_error',"something wen't wrong try again");
        }
    }
}
