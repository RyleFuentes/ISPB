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
    use WithPagination;

    public $products;
    public addOrderForm $add_order;
    public $product_quantity;
    public $change_page = 1;
    public $toggle_input;
    public $paginate_number = 10;

    //! lifecycle hook for when add_order->brandID is updated/changed
    public function updatedAddOrderBrandID()
    {
        $this->add_order->product = null;
    }

    public function updatedAddOrderTypeOrder()
    {
        if ($this->add_order->type_order == 1) {
            $this->toggle_input = 1;
        } else {
            $this->toggle_input = 2;
        }
    }

    public function submit_order()
    {
        $this->add_order->store();
    }

    public function completeOrder(Order $order)
    {
        if ($order->status === 0) {
            if ($order->order_type === 1) {
                $newKilo = $order->product->kilo - $order->order_kilo;
                $order->product->update([
                    'kilo' => $newKilo,
                ]);
            } else {
                $product = $order->product;
                $order_qty = $order->order_quantity;

                $batches = $product
                    ->batch()
                    ->orderBy('expiration_date', 'asc')
                    ->get();
                $remaining_qty = $order_qty;

                foreach ($batches as $batch) {
                    $quantityToDeduct = min($remaining_qty, $batch->quantity);

                    // Update the batch quantity
                    $batch->update(['quantity' => $batch->quantity - $quantityToDeduct]);
                    if ($batch->quantity === 0) {
                        // Delete the batch from the database
                        $batch->delete();
                    }
                    // TODO: Save information to Orders table
                    // You need to decide how to store the order information in your Orders table
                    // For example, you might have a pivot table that links orders to batches.

                    $remaining_qty -= $quantityToDeduct;

                    if ($remaining_qty <= 0) {
                        break;
                    }
                }
            }

            $order->update(['status' => 1]);
            session()->flash('success', 'you have successfully completed the order !');
        } else {
            session()->flash('error', 'This order has been completed');
        }
    }

    public function cancelOrder(Order $order)
    {
        $update = $order->update(['status' => 2]);

        if ($update) {
            session()->flash('success', 'You have cancelled the order');
        }
    }

    public function toggle_on()
    {
        $this->change_page = 2;
    }

    public function toggle_off()
    {
        $this->change_page = 1;
    }

    public function updateProducts()
    {
        if ($this->add_order->brandID) {
            // get the products for the selected brand
            $this->products = Product::where('brandID', $this->add_order->brandID)->get();
        } else {
            // reset the products and product value
            $this->products = collect();
            $this->add_order->product = null;
        }
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('test_pdf');
        return $pdf->download('invoice.pdf');
    }

    #[Computed]
    public function completedOrders()
    {
        return Order::whereIn('status', [1, 2])
            ->latest()
            ->paginate(10);
    }


    public $toggleStatus;

    public function updatedToggleStatus()
    {
        if ($this->toggleStatus == 1) {
            $this->dispatch('search-completed');
            $this->showCancelled = false;
            $this->showCompleted = true;
        } elseif ($this->toggleStatus == 2) {
            $this->dispatch('search-cancelled');
            $this->showCompleted = false;
            $this->showCancelled = true;
        }
    }

    #[On('search-completed')]
    #[Computed]
    public function sortCompleted()
    {
        return Order::where('status', 1)->paginate(10);
    }

    #[On('search-cancelled')]
    #[Computed()]
    public function sortCancelled()
    {
        return Order::where('status', 2)->paginate(10);
    }

    
    public $showCompleted = false;
    public $showCancelled = false;
    public function generatePdf()
    {
        $user = Auth::user();

        if ($this->showCompleted == false && $this->showCancelled == false) {
            $allOrders = Order::whereIn('status', [1, 2])->get();
        } else {
            $completedOrders = $this->showCompleted
                ? Order::where('status', 1)
                    ->latest()
                    ->get()
                : collect();

            $cancelledOrders = $this->showCancelled
                ? Order::where('status', 2)
                    ->latest()
                    ->get()
                : collect();

            $allOrders = $completedOrders->merge($cancelledOrders);
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
            'Content-Disposition' => 'inline; filename="Order_History_Report.pdf"',
        ]);
    }

    public function render()
    {
        $pending_orders = Order::where('status', 0)->paginate(10);
        $data = compact('pending_orders');

        if ($this->toggleStatus == 1) {
            $sortOrders = $this->sortCompleted();
            $data['orders'] = $sortOrders;
        } 
        elseif($this->toggleStatus == 2)
        {
            $cancelledOrder = $this->sortCancelled();
            $data['orders'] = $cancelledOrder;
        }
        else {
            $orders = $this->completedOrders();

            $data['orders'] = $orders;
        }

        return view('orders', $data);
    }
}
