<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Brand;
use Illuminate\Validation\Rules\Unique;

class AddProductFromTableForm extends Form
{
    #[Rule('required')]
    public $brand;

    #[Rule('required|min:3|max:40|unique:products,product_name')]
    public $prod_name;
    #[Rule('required|integer')]
    public $quantity;

    #[Rule('required|numeric')]
    public $retail;
    #[Rule('required|numeric')]
    public $wholesale;
    #[Rule('date|required')]
    public $expiration_date;

    public function store()
    {
        $validated = $this->validate();

        $brand = Brand::findOrFail($validated['brand']);
        $product = $brand->products()->create([
            'product_name' => $validated['prod_name'],
            'retail_price' => $validated['retail'],
            'wholesale_price' => $validated['wholesale'],
            
        ]);

        $batch = $product->batch()->create([
            'quantity' => $validated['quantity'],
            'expiration_date' => $validated['expiration_date'],
        ]);

        if($product && $batch)
        {
            $this->reset();
            session()->flash('success','You have successfully added a new product to '. $brand->brand_name . ' brand.');
        }
    }
}
