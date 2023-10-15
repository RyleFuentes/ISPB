<?php

namespace App\Livewire\Pages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('index')]
#[Title('Products')]
class Products extends Component
{
    use WithFileUploads;


    public $brand = '' ;
   
    public $addProduct=false;


    //?----- FOR PRODUCT INFO -------------

    public $product_name, $product_qty, $product_retail_price, $product_wholesale_price, $product_image, $brand_id;


    public function addNewProduct()
    {
        $validated = $this->validate([
            'product_name' => 'required|min:3|max:50',
            'product_qty' => 'required',
            'product_retail_price' => 'required',
            'product_wholesale_price' => 'required',
            'product_image' => 'required|image',
        ]);

        if($validated['product_image'])
        {
            $validated['product_image'] = $this->product_image->store('product_images', 'public');
        }
        
        $store = Product::create([
            'product_name' => $validated['product_name'],
            'quantity' => $validated['product_qty'],
            'retail_price' => $validated['product_retail_price'],
            'wholesale_price' => $validated['product_wholesale_price'],
            'product_image' => $validated['product_image'],
            'brandID' => $this->brand_id
        ]);

       if($store)
       {
        return redirect()->route('products')->with('success', 'You have successfully added a new product');
        $this->reset('product_name', 'product_qty', 'product_retail_price', 'product_wholesale_price', 'product_image', 'brand_id');
       }

    }

    public function addProductMode()
    {
        $this->addProduct=true;
    }

    public function addBrand()
    {
        $validated = $this->validate([
            'brand' => 'required'
        ]);
        


        $add = Brand::create([
            'brand_name' => $validated['brand']
        ]);

        if($add)
        {
            $this->dispatch('hide:add-brand-modal');
            $this->reset('brand');
        }
        session()->flash('success', 'You have successfully added a brand');
    }


    public function render()
    {

        $brands = Brand::all();
        $products = Product::all();
        
        return view('livewire.pages.products', compact('brands', 'products'));
        
    }
}
