<?php

namespace App\Livewire\Pages\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\On;

class OrderHistory extends Component
{
    public $toggleStatus;
    public $checked;

    public $selectedItemIds = [];

    public function checkedItem(Order $order)
    {
        if (!in_array($order->order_id, $this->selectedItemIds)) {
            $this->selectedItemIds[] = $order->order_id;
        } else {
            // Find the index of the order ID in the array
            $index = array_search($order->order_id, $this->selectedItemIds);

            // Remove the order ID from the array
            unset($this->selectedItemIds[$index]);
        }
    }

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

    #[Computed]
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

        if ($this->prod_id) {
            $query->where('productID', $this->prod_id);
        }

        

        // Eager loading products
        $query->with('product');

        return $query->latest()->paginate(10);
    }

    public function updatedProdId()
    {
        if (!$this->prod_id) {
            $this->reset('prod_id');
        }
        $this->Orders()->where('productID', $this->prod_id);
    }

    public $start, $end;

    public function generatePdf()
    {
        $user = Auth::user();


        if(!empty($this->selectedItemIds))
        {
            $allOrders = $this->Orders()->whereIn('order_id', $this->selectedItemIds);
        }
        else
        {

            $allOrders = $this->Orders();
        }
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
        $pdf->Cell(0, 10, 'Order History:', 0, 1, 'L');

        // Calculate the X-position to center the table
        $tableWidth = 190; // Total width of the table cells (sum of individual cell widths)
        $xPosition = ($pageWidth - $tableWidth) / 2;

        $pdf->SetX($xPosition); // Set X-position to center for the table
        $pdf->Cell(30, 10, 'Order ID', 1);
        $pdf->Cell(60, 10, 'Product Name', 1);
        $pdf->Cell(30, 10, 'Amount', 1);
        $pdf->Cell(40, 10, 'Status', 1);
        $pdf->Cell(30, 10, 'Recipient', 1);
        $pdf->Ln();

        // Add table rows
        foreach ($allOrders as $order) {
            $pdf->SetX($xPosition); // Set X-position to center for each row
            $pdf->Cell(30, 10, $order->order_id, 1);
            $pdf->Cell(60, 10, $order->product->product_name, 1);
            if ($order->order_type == 1) {
                $pdf->Cell(30, 10, $order->order_kilo . ' kg', 1);
            } else {
                $pdf->Cell(30, 10, $order->order_quantity . ' bags', 1);
            }

            // Display "Completed" for status 1 and "Cancelled" for status 2
            $statusText = $order->status == 1 ? 'Completed' : ($order->status == 2 ? 'Cancelled' : '');

            $pdf->Cell(40, 10, $statusText, 1);
            $pdf->Cell(30, 10, $order->recipient, 1); // Display recipient
            $pdf->Ln();
        }

        $pdf->Ln(10); // Add some space between the title and user's name
        $pdf->Cell(0, 10, 'Prepared by: ' . $user->name, 0, 1, 'R');

        $pdfContent = $pdf->Output('S');

        $filename = 'Order_History_Report_' . date('Ymd') . '_' . uniqid() . '.pdf';

        return response()->stream(fn() => print $pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);

    }

    #[On('cancelled')]
    public function cancelled($update = null)
    {}

    #[On('order-completed')]
    public function competed()
    {}

    public function render()
    {
        $pending_orders = Order::where('status', 0)->paginate(10);
        $orders = $this->Orders();
        $data = compact('pending_orders', 'orders');

        return view('livewire.pages.orders.order-history', $data);
    }
}
