<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use App\Models\Brand;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Livewire\Attributes\Rule;
class AddSupplierForm extends Form
{
    #[Rule('required|min:3|max:30', as:'Supplier Name')]
    public $name;
    #[Rule('required|email|unique:users,email', as:'Email')]
    public $email;

    #[Rule('required', as:'Brand')]
    public $brand_id;
    // public $agent;

    #[Rule('required', as:'Agent number')]
    public $agent_number;

    #[Rule('required|min:5|max:30', as:'Description')]
    public $desc;
    // public $supplier_category = [];

    #[Rule('required')]
    public $categories = [];

   

    #[Computed()]
    public function brands()
    {
        return Brand::all();
    }

    public function store()
    {
    
        $validated = $this->validate();
        $brand = Brand::findOrFail($validated['brand_id']);

        $store = $brand->supplier()->create([
            'agent_name' => $validated['name'],
            'supplier_email' => $validated['email'],
            'contact_info' => $validated['agent_number'],
            'description' => $validated['desc'],
            'categories' => $this->categories,
        ]);
        // $store->categories()->attach($this->category_ids);
        if($store)
        {
            $this->reset();
            return back()->with('modal_success','you have added a new supplier');
        }
        else
        {
            return back()->with('modal_error',"something wen't wrong try again");
        }

       
    }
}
