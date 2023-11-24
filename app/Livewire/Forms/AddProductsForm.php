<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class AddProductsForm extends Form
{
    #[Rule('required|min:3|max:20')]
    public $prod_name;
    #[Rule('required')]
    public $quantity;
    #[Rule('required')]
    public $retail_price;
    #[Rule('required')]
    public $wholesale_price;

    public function add_form($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $validated = $this->validate();

        $store = $brand->products()->create([
            'product_name' => $validated['prod_name'],
            'quantity' => $validated['quantity'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
        ]);
        
        if($store)
        {

            session()->flash('success', "You have successfully added a new product");
            $this->reset('prod_name', 'quantity', 'retail_price', 'wholesale_price');
        }
    }

}
