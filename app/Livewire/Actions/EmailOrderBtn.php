<?php

namespace App\Livewire\Actions;

use Livewire\Component;
use App\Models\Supplier;
use App\Providers\RouteServiceProvider;
class EmailOrderBtn extends Component
{
    public $supp_id;
    public function mount(Supplier $supplier)
    {
        $this->supp_id = $supplier->id;
    }

    public function confirm_order(Supplier $supplier)
    {
        $orders = $supplier->supplier_orders();

        foreach($orders as $order)
        {
            $order->update([
                'status' => 1
            ]);
        }
    }
   
    public function render()
    {
        return view('livewire.actions.email-order-btn');
    }
}
