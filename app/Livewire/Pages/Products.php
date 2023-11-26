<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\addBatchForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use App\Livewire\Forms\AddProductsForm;
use App\Livewire\Forms\AddBrandsForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


#[Layout('index')]
#[Title('Products')]
class Products extends Component
{
    use WithPagination;
    use WithFileUploads;


    public AddBrandsForm $add_brands_form;
    public $brand;
    public $quantity;
    public $search = '';
    public $addBrandMode = false;
    public $addProduct=false;
    public $tableMode = true;
    public $cardMode = false;
    public $view_batch = false;


    public function mount()
    {

    }


    public addBatchForm $batch_form;
    public function add_batch(Product $product)
    {
        $this->batch_form->add_new_batch($product->product_id);
    }



    public $product;
    public function view_product_info(Product $product)
    {

        $this->product = $product;
        $this->view_batch = true;
        $this->tableMode = false;
    }

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

    public function toggle_card()
    {
        $this->cardMode = true;
        $this->tableMode = false;
    }

    public function toggle_table()
    {
        $this->cardMode = false;
        $this->tableMode = true;
    }

    //?-------ADDING PRODUCTS-------------
    public AddProductsForm $product_form ;

    public function add_product()
    {
        $this->product_form->add_form($this->brand_view_id);
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

    //? ----------- DELETING PRODUCTS ----------------
    public function delete_product(Product $product)
    {

        if($product->batch()->exists())
        {

            session()->flash('error', 'This product still has some active batches!!!');
        }
        else
        {

            
            $product->delete();
            session()->flash("success","You have successfully deleted the product");
        }

    }

   

    public function render()
    {

        $results = [];
        
        if($this->brand_view_id)
        {
            $this->brand = Brand::where('brand_id', $this->brand_view_id)->first();
        }

        $brands = Brand::all();
        $data = compact('brands');
        
        if(strlen($this->search) >= 1)
        {
            $results = Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(10);
            $data['products'] = $results;
        }
        else
        {
            $products = Product::paginate(10);
            $data['products'] = $products;
        }

        return view('livewire.pages.products', $data);
        
    }
}
