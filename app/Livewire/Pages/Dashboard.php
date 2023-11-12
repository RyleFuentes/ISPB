<?php

namespace App\Livewire\Pages;

use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

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
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
            ->addColumn('Commute', 360, '#90cdf4')
            ->addColumn('School allowance', 2000, '#90cdf4')
            ->setAnimated(true);



        $areaChartModel =
            (new AreaChartModel())
            ->setTitle('Expenses by Type')
            ->addPoint('Travel', 300, '#f6ad55')
            ->addPoint('Travel', 600, '#90cdf4')
            ->addPoint('Travel', 900, '#90cdf4')
            ->addPoint('Travel', 650, '#90cdf4')
            ->addPoint('Travel', 320, '#90cdf4')
            ->addPoint('Travel', 1563, '#fc8181')
            ->setAnimated(true);
            

        return view('livewire.pages.dashboard')->with([
            'columnChartModel' => $columnChartModel, 
            'areaChartModel' => $areaChartModel]);
    }
}
