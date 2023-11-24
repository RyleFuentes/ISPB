<?php

namespace App\Livewire\Pages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use App\Livewire\Forms\AddBrandsForm;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('index')]
#[Title('Products')]
class Products extends Component
{
    use WithFileUploads;

    public AddBrandsForm $add_brands_form;
    public $brand = '' ;

    public $addBrandMode = false;
    public $addProduct=false;

    public function add_brand_mode_on()
    {
        $this->addBrandMode = true;
    }


    public $brand_view_id;
    public $view_product_mode = false;
    public function view_product_list(Brand $brand)
    {
        $this->brand_view_id = $brand->brand_id;
        $this->view_product_mode = true;
    }

    public function addProductMode()
    {
        $this->addProduct=true;
    }

    public function cancel_add_mode()
    {
        $this->addBrandMode = false;
        $this->addProduct = false;
        $this->view_product_mode = false;
    }

    //?----- ADDING BRANDS ----------
    public function add_brand()
    {
        $this->add_brands_form->addBrand();
        $this->addBrandMode = false;
        session()->flash('success', 'You have successfully added a new brand!!');
    }

    //? ---------- DELETING BRANDS ----------------
    public function delete_brand(Brand $brand)
    {
        if($brand->products->count() < 1)
        {
            $brand->delete();
            session()->flash('success','you have successfully deleted a brand');
        }

        session()->flash('error', "This brand can't be deleted, it still containts products");
        
    }

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

       else{
        return redirect()->route('products')->with('fail', 'Something went wrong please try again');
       }

    }

    public function render()
    {

        $brands = Brand::all();
        $products = Product::all();
        
        return view('livewire.pages.products', compact('brands', 'products'));
        
    }
}
