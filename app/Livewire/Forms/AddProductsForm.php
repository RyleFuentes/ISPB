<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class AddProductsForm extends Form
{
    #[Rule('required|min:3|max:20|unique:products,product_name', as:'Product name')]
    public $prod_name;
    
    #[Rule('required|min:3|max:250')]
    public $prod_description;

    #[Rule('required', as:'Quantity')]
    public $quantity;


    #[Rule('required|numeric', as:'Retail Price')]
    public $retail_price;
    #[Rule('required|numeric', as:'Wholesale Price')]
    public $wholesale_price;

    #[Rule('required|date|after_or_equal:today', as:'Expiration Date')]
    public $expiration_date;

    public function calculateKilo($quantity)
    {
        return $quantity * 50;
    }
    public function add_form($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $validated = $this->validate();
        $kilo = $this->calculateKilo($validated['quantity']);
        $store = $brand->products()->create([
            'product_name' => $validated['prod_name'],
            'product_description' => $validated['prod_description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            'kilo' => $kilo
        ]);
        

        $setBatch = $store->batch()->create([
            'expiration_date' => $validated['expiration_date'],
            'quantity' => $validated['quantity'],
        ]);
        
        
        if($store && $setBatch)
        {

            session()->flash('success', "You have successfully added a new product");
            $this->reset();
        }
    }

}