<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\Orders\addOrderForm;
use App\Models\Brand;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\App;
use Dompdf\Options;
use Auth;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
#[Title('Orders')]
class Orders extends Component
{
    

    


    
    public function render()
    {   
        return view('orders');
    }
}
