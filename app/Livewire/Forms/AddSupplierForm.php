<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Livewire\Attributes\Rule;
class AddSupplierForm extends Form
{
    #[Rule('required|min:3|max:30|regex:/^[^\d]/', as:'Supplier Name')]
    public $name;
    
    #[Rule('required|email|unique:users,email', as:'Email')]
    public $email;

    #[Rule('required', as:'Brand')]
    public $brand_id;
    // public $agent;

    #[Rule('required|regex:/^09\d{9}$/|min:11', as:'Agent number')]
    public $agent_number;

    #[Rule('required|min:5|max:30', as:'Description')]
    public $desc;
    // public $supplier_category = [];

    #[Rule('required', as:'Categories')]
    public $categories = [];

    protected $messages = [
        'name.required' => 'The supplier name is required.',
        'name.min' => 'The supplier name must be at least :min characters.',
        'name.max' => 'The supplier name may not be greater than :max characters.',
        'name.regex' => 'The supplier name must not start with a number.',

        'email.required' => 'The email address is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'The email address has already been taken.',

        'brand_id.required' => 'The brand is required.',

        'agent_number.required' => 'The contact number is required.',
        'agent_number.regex' => 'The contact number format is invalid.',
        'agent_number.min' => 'The contact number should atleast contain 11 numbers.',

        'desc.required' => 'The description is required.',
        'desc.min' => 'The description must be at least :min characters.',
        'desc.max' => 'The description may not be greater than :max characters.',

        'categories.required' => 'At least one category is required.',
    ];
   

    #[Computed()]
    public function brands()
    {
        return Brand::all();
    }

    public function store()
    {
        // dd($this->categories);
    
        $validated = $this->validate();
        $brand = Brand::findOrFail($validated['brand_id']);

        $store = $brand->supplier()->create([
            'agent_name' => $validated['name'],
            'supplier_email' => $validated['email'],
            'contact_info' => $validated['agent_number'],
            'description' => $validated['desc'],
        ]);
        
       foreach  ($validated['categories'] as $category)
       {
        $store->categories()->attach($category);
       }
        if($store)
        {
            session()->flash('modal_success', 'Supplier Added Successfully');
            $this->reset();
        }
        else
        {
            session()->flash('modal_error', 'Supplier Not Added');
        }

       
    }
}
