<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $pending_orders = Order::where('status', 0)->count();
        $completed__orders = Order::where('status', 1)->count();
        $cancelled_orders = Order::where('status',2)->count();
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
