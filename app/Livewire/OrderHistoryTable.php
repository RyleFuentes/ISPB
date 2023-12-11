<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateRangeFilter, DateFilter, MultiSelectFilter, SelectFilter};
use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class OrderHistoryTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPaginationStatus(true);
        $this->setPaginationEnabled(true);
        $this->setPerPageAccepted([5, 10, 25, 50, 100]);
        $this->setPerPage(5);
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $columns = [
            Column::make('Ordered Product', 'product.product_name')->sortable(),
            Column::make('Delivery Date', 'due_date')->sortable(),
            Column::make('Total Price', 'total_price')->sortable(),
            Column::make('Order per Bag', 'order_quantity')->sortable(),
            Column::make('Order per Kilo', 'order_kilo')->sortable(),
            Column::make('Recipient', 'recipient')->sortable(),
            Column::make('Status', 'status')
                ->sortable()
                ->format(function ($value) {
                    return $value == 1 ? 'Completed' : ($value == 2 ? 'Cancelled' : 'Unknown');
                }),
        ];

        return $columns;
    }

    public function builder(): Builder
    {
        return Order::whereIn('status', [1, 2]);
    }

    public function filters(): array
    {
        return [
            DateRangeFilter::make('Delivery Date')
                ->config([
                    'allowInput' => true, // Allow manual input of dates
                    'altFormat' => 'F j, Y', // Date format that will be displayed once selected
                    'ariaDateFormat' => 'F j, Y', // An aria-friendly date format
                    'dateFormat' => 'Y-m-d', // Date format that will be received by the filter
                    'placeholder' => 'Enter Date Range', // A placeholder value
                ])
                ->setFilterPillValues([0 => 'minDate', 1 => 'maxDate']) // The values that will be displayed for the Min/Max Date Values
                ->filter(function (Builder $builder, array $dateRange) {
                    // Expects an array.
                    $builder
                        ->whereDate('due_date', '>=', $dateRange['minDate']) // minDate is the start date selected
                        ->whereDate('due_date', '<=', $dateRange['maxDate']); // maxDate is the end date selected
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $orders = $this->getSelected();

        $this->clearSelected();

        $pdf = $this->generatePdf($orders);

        return response()->stream(fn() => $pdf->stream('order_history.pdf', ['Attachment' => false]));
    }

    protected function generatePdf($orders)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        $html = View::make('livewire.order-history-table.export', ['orders' => $orders])->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf;
    }
}
