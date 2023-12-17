<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\addBatchForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Rule;
use App\Models\Batch;
use App\Livewire\Forms\AddProductsForm;
use App\Livewire\Forms\AddBrandsForm;
use App\Livewire\Forms\AddProductFromTableForm;
use App\Livewire\Forms\EditForm;
use App\Livewire\Forms\EditFormBatch;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Auth;


#[Layout('layouts.app')]
#[Title('Products')]
class Products extends Component
{
    use WithPagination;
    use WithFileUploads;


    protected $dontConvertToLivewireComponents = ['product'];

    public AddBrandsForm $add_brands_form;
    public $brand;
    public $product;
    public $quantity;
    public $search = '';
    public $addBrandMode = false;
    public $addProduct = false;
    public $tableMode = true;
    public $cardMode = false;
    public $view_batch = false;

    public $kilo_id;
    public $edit_kilo = false;
    #[Rule('required|numeric', as: 'Kilo Value')]
    public $kilo_val;

    public function update_kilo()
    {
        $validated = $this->validateOnly('kilo_val');

        $product = Product::findOrFail($this->kilo_id);
        $update = $product->update([
            'kilo' => $validated['kilo_val'],
        ]);

        if($update)
        {

            session()->flash('success','You have successfully edited the Kilo value of the product');
            $this->reset('kilo_id', 'kilo_val');
            $this->edit_kilo = false;
        }
        else
        {
            session()->flash('error','Something went wrong, try again...');
        }
    }
    public function set_edit_kilo(Product $product)
    {
        $this->kilo_id = $product->product_id;
        $this->kilo_val = $product->kilo;
        $this->edit_kilo = true;

    }

    public function unset_edit_kilo()
    {
 
        $this->edit_kilo = false;
       
    }



   



    public $set_id;
    public $editing_mode = false;
    public EditForm $editForm;
    public function set_edit(Product $product)
    {
       $this->set_id = $product->product_id;
       $this->editForm->set_edit_values($product->product_id);
       $this->editing_mode = true;

    }

    public function update_edited()
    {
        $this->editForm->edit_brand_product_table($this->set_id);
        if($this->editForm->success == true)
        {
            $this->reset('set_id');
            $this->editing_mode = false;
            session()->flash('success', 'You have successfully updated the data');
        }
        else{
            session()->flash('error', 'Something went wrong...');
        }
    }


    public function set_edit_batch(Batch $batch)
    {
        $this->set_id = $batch->batch_id;
        $this->edit_form_batch->set_edit_values_batch($batch->batch_id);
        $this->editing_mode = true;
    }


    public EditFormBatch $edit_form_batch;
    public function update_batch_form()
    {
        $this->edit_form_batch->update_batch($this->set_id);
        if($this->edit_form_batch->success == true)
        {
            $this->reset('set_id');
            $this->editing_mode = false;
            session()->flash('success', 'You have successfully edited this batch');
        }
        else
        {
            session()->flash('error', 'something went wrong...');
        }
    }

    public function cancel_edit()
    {
        $this->reset('set_id');
        $this->editing_mode = false;
    }



    public function delete_batch(Batch $batch)
    {
        if($batch->quantity > 0)
        {
            session()->flash('error','The quantity of this batch is still more than 1');
        }
        else
        {
            $batch->delete();
            session()->flash('success','You have successfully deleted this batch');
        }
        
    }

    public function table_mode()
    {
        $this->view_product_mode = false;
        $this->view_batch = false;
        $this->addBrandMode = false;
        $this->tableMode = true;
        $this->editing_mode = false;
    }

    public AddProductFromTableForm $table_product_form;
    public function add_table_product()
    {
        $this->table_product_form->store();
    }

    public addBatchForm $batch_form;
    public function add_batch(Product $product)
    {
        $this->batch_form->add_new_batch($product->product_id);
    }




    public function view_product_info(Product $product)
    {

        $this->product = $product;
        $this->cardMode = false;
        $this->view_batch = true;
        $this->tableMode = false;
    }

    public function unview_product_info()
    {

        $this->reset('product');
        $this->view_batch = false;
        $this->tableMode = true;
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
        $this->brand = Brand::findOrFail($this->brand_view_id);
        $this->tableMode = false;
        $this->view_product_mode = true;
       
    }

    public function addProductMode()
    {
        $this->addProduct = true;
    }

    public function cancel()
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
    public AddProductsForm $product_form;

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
        if ($brand->products->count() < 1) {
            $brand->delete();
            session()->flash('success', 'you have successfully deleted a brand');
        }

        session()->flash('error', "This brand can't be deleted, it still containts products");
    }

    //? ----------- DELETING PRODUCTS ----------------
    public function delete_product(Product $product)
    {

        if ($product->batch()->exists()) {

            session()->flash('error', 'This product still has some active batches!!!');
        } else {


            $product->delete();
            session()->flash("success", "You have successfully deleted the product");
        }
    }



    public function render()
    {


        $results = [];
        $brands = Brand::all();
      
        $data = compact('brands');
        

        if (strlen($this->search) >= 1) {
            // $results = Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(10);
            $results = Product::where(function($query) {
                $query->where('product_name', 'like', '%' . $this->search . '%')
                      ->orWhereHas('brand', function($brandQuery) {
                          $brandQuery->where('brand_name', 'like', '%' . $this->search . '%');
                      });
            })->paginate(10);
            
            $data['products'] = $results;
        } else {
            $products = Product::paginate(10);
            $data['products'] = $products;
        }

        return view('products', $data);
    }

    public function generateProductPdf()
    {
        $user = Auth::user();

        $allProducts = Product::all();
        //$data['products'] = $products;

        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Ln(10);

        $imagePath = public_path('images\logo.png');
        $pageWidth = $pdf->GetPageWidth();
        $xPosition = ($pageWidth - 45) / 2;
        $yPosition = $pdf->GetY();
        $pdf->Image($imagePath, $xPosition, $yPosition, 45, 0, 'PNG');
        
        $pdf->Ln(25);
        $pdf->Cell(0, 10, 'Inventory System for Poultry Business', 0, 1, 'C'); 
        //$pdf->Ln(10);
        $pdf->Cell(0, 10, now()->format('F j, Y'), 0, 1, 'C');

        $pdf->Ln(10); // Add some space before displaying orders
        $pdf->Cell(0, 10, 'Product Reports', 0, 1, 'L');
        
        // Calculate the X-position to center the table
        $tableWidth = 170; // Total width of the table cells (sum of individual cell widths)
        $xPosition = ($pageWidth - $tableWidth) / 2;

        $pdf->SetX($xPosition); // Set X-position to center for the table

        // Adjusted cell widths to match the total table width
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(35, 10, 'Product Name', 1);
        $pdf->Cell(25, 10, 'Brand', 1);
        $pdf->Cell(25, 10, 'Quantity', 1);
        $pdf->Cell(25, 10, 'Kilo', 1);
        $pdf->Cell(30, 10, 'Retail Price', 1);
        $pdf->Cell(30, 10, 'Wholesale Price', 1);
        $pdf->Ln();

        // Add table rows
        foreach ($allProducts as $product) {
            $pdf->SetX($xPosition); // Set X-position to center for each row

            // Adjusted cell widths to match the total table width
            $pdf->Cell(35, 10, $product->product_name, 1);
            $pdf->Cell(25, 10, $product->brand->brand_name, 1);
            $pdf->Cell(25, 10, $product->total_quantity, 1); // Assuming $product->amount is correct
            $pdf->Cell(25, 10, $product->kilo, 1);
            $pdf->Cell(30, 10, $product->retail_price, 1);
            $pdf->Cell(30, 10, $product->wholesale_price, 1);
            $pdf->Ln();
        }

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Ln(10); // Add some space between the title and user's name
        $pdf->Cell(0, 10, 'Prepared by: ' . $user->name, 0, 1, 'R');
    
        $pdfContent = $pdf->Output('S');

        return response()->stream(
            fn () => print($pdfContent),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Product_Report.pdf"',
            ]
        );
    }
}