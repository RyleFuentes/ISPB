<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Product;
use App\Models\Batch;

class EditForm extends Form
{
    //?------ VARIABLES FOR EDIT FORM IN BRAND PRODUCT TABLE COMPONENTS ------------
    
    #[Rule('required|min:3|max:20')]
    public $prod_name;
    #[Rule('required|numeric')]
    public $retail;
    #[Rule('required|numeric')]
    public $wholesale;


   public $success = false;

    public function set_edit_values($prod_id)
    {
        $product = Product::findOrFail($prod_id);
        $this->prod_name = $product->product_name;
        $this->retail = $product->retail_price;
        $this->wholesale = $product->wholesale_price;
    }

    public function edit_brand_product_table($prod_id)
    {
        $product = Product::findOrFail($prod_id);

        $validated = $this->validate();
        $update= $product->update([
            'product_name' => $validated['prod_name'],
            'retail_price' => $validated['retail'],
            'wholesale_price' => $validated['wholesale'],
        ]);


        if($update)
        {
            $this->reset();
            $this->success = true;
        }
        

    }
}
