<?php

namespace App\Livewire\Pages\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Carbon;
use App\Models\Product;
use Livewire\Attributes\On;

class OrderHistory extends Component
{

    public $toggleStatus;

    public function updatedToggleStatus()
    {
        if ($this->toggleStatus == 1) {
            $this->showCancelled = false;
            $this->showCompleted = true;
        } elseif ($this->toggleStatus == 2) {
            $this->showCompleted = false;
            $this->showCancelled = true;
        }
    }


    public $showCompleted = false;
    public $showCancelled = false;
    public $products;
    public $recipients;
    public $filteredProducts;
    public $prod_id;

    #[Computed()]
    public function Orders()
    {
        $query = Order::query();

        if ($this->toggleStatus == 1) {
            $query->where('status', 1);
        } elseif ($this->toggleStatus == 2) {
            $query->where('status', 2);
        } else {
            $query->whereIn('status', [1, 2]);
        }

        if ($this->start && $this->end) {
            $endOfDay = Carbon::parse($this->end)->endOfDay();
            $query->whereBetween('created_at', [$this->start, $endOfDay]);
        }


        

        //Current Products of the current query
        $orderIds = $query->pluck('productID'); 
        //Sets the products property to the fetched products collection
        $this->products = Product::whereIn('product_id', $orderIds)->get();

        $this->recipients = $this->products->orders->get();

        if ($this->prod_id) {
            $query->where('productID', $this->prod_id);
        }
        
    
        // Eager loading products
        $query->with('product');

        return $query->latest()->paginate(10);
    }


    public function updatedProdId()
    {
        if(!$this->prod_id)
        {        
            $this->reset('prod_id');
        
        }
        $this->Orders()->where('productID', $this->prod_id);
    }

    public $start, $end;






    // //? ========= COMPUTED PROPERTY FOR THE ONLY COMPLETED ORDERS ===========
    // #[Computed]
    // public function sortCompleted()
    // {
    //     return Order::where('status', 1)->paginate(10);
    // }


    // //? ========= COMPUTED PROPERTY FOR THE CANCELLED ORDERS ======== 
    // #[Computed()]
    // public function sortCancelled()
    // {
    //     return Order::where('status', 2)->paginate(10);
    // }





    // //? ========== COMPUTED PROPERTY FOR THE ALL COMPLETED ORDERS ====================
    // #[Computed()]
    // public function completedOrders()
    // {
    //     return Order::whereIn('status', [1, 2])
    //         ->latest()
    //         ->paginate(10);
    // }


    public function render()
    {
        $pending_orders = Order::where('status', 0)->paginate(10);
        $orders = $this->Orders();
        $data = compact('pending_orders', 'orders');

        return view('livewire.pages.orders.order-history', $data);
    }
}
