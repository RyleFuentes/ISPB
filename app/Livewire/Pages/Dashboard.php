<?php

namespace App\Livewire\Pages;

use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


#[Layout('index')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {

        $columnChartModel =
            (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->setAnimated(true)
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
            ->addColumn('Commute', 360, '#90cdf4')
            ->addColumn('School allowance', 2000, '#90cdf4')
            ->setAnimated(true);

      

        return view('livewire.pages.dashboard')->with([
            'columnChartModel' => $columnChartModel,
           
        
        ]);
    }
}
