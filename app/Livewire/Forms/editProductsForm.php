<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class editProductsForm extends Form
{
    public $brand;
    public $name;
    public $quantity;
    public $retail;
    public $wholesale;
    public $expiration;

    public function store($prod_id)
    {
        $product = Product::findOrFail($prod_id);
        $this->brand = $product->brand()->brand_name;
        $this->name = $product->product_name;
        $this->quantity = $
    }
}
