<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Product;
use App\Models\Brand;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{

    public $total_sales, $completed_orders;
    public $total_products, $products_with_batches;
    public $total_brands, $brands_with_products;
    public $least_stocks;

    public function mount()
    {
        $this->total_sales = Order::calculateTotalSales();
        $this->completed_orders = Order::where('status', 1)->count();
        $this->total_products = Product::TotalProducts();
        $this->total_brands = $this->totalBrands();
        $this->brands_with_products = $this->brandsWithProducts();
        $this->products_with_batches = $this->productsWithBatches();
        $this->least_stocks = $this->leastStocks();
    }

    public function leastStocks()
    {
        // Get all products and sort them by total_quantity in ascending order
        $products = Product::all()->sortBy('total_quantity');

        $least_prod = [];
        foreach ($products as $product) {
            if ($product->total_quantity < 20) {
                $least_prod[] = $product;
            }
        }
        // Take the top 5 products with the least stocks
        return $least_prod;

       
    }
    public function productsWithBatches()
    {
        return Product::has('batch')->count();
    }
    public function totalBrands()
    {
        return Brand::count();
    }
    public function brandsWithProducts()
    {
        return Brand::has('products')->count();
    }



    public function render()
    {
        $pending_orders = Order::where('status', 0)->count();
        $completed__orders = Order::where('status', 1)->count();
        $cancelled_orders = Order::where('status', 2)->count();
        $columnChartModel =
            (new ColumnChartModel())
            ->setTitle('ORDERS')
            ->setAnimated(true)
            ->addColumn('Pending Orders', $pending_orders, '#f6ad55')
            ->addColumn('Completed Orders', $completed__orders, '#008000')
            ->addColumn('Cancelled Orders', $cancelled_orders, '#ff0000')
            ->setAnimated(true);



        return view('dashboard')->with([
            'columnChartModel' => $columnChartModel,


        ]);
    }
}
