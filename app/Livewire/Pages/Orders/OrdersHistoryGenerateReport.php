<?php

namespace App\Livewire\Pages\Orders;

use Livewire\Component;
use FPDF;

use Barryvdh\DomPDF\Facade\Pdf;

class OrdersHistoryGenerateReport extends Component
{
    public function render()
    {
        
        return view('livewire.pages.orders.orders-history-generate-report');
    }

    // public function generatePdf()
    // {
    //     // Your FPDF logic to generate the PDF

    //     $pdf = Pdf::loadView('livewire.pages.orders.order_history_table', $data);
    //     return $pdf->download('invoice.pdf');
    // }

    public function generatePdf()
    {
        $data = Order::whereIn('status', [1, 2])->latest()->get()->toArray();

        // Transformed code with get()->toArray()
        //


        $pdf = PDF::loadView('livewire.Cvb', ['data' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
