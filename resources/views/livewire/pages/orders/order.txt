<div class="bg-white rounded shadow-sm container p-3">
    @include('livewire.messages.message')
    <h3>Order history</h3>

    <table class="table table-striped table-hover">
        <thead>
            <tr class="fw-semibold">

                <td scope="col" class="text-dark">Ordered Product</td>
                <td scope="col" class="text-dark">Delivery Date</td>
                <td scope="col" class="text-dark">Amount</td>
                <td scope="col" class="text-dark">Total Price</td>
                <td scope="col" class="text-dark">Status</td>

            </tr>
        </thead>
        <tbody>
            @foreach ($completed_orders as $order)
                @if ($order->status === 1 || $order->status === 2)
                    <tr>

                        <td>{{ $order->product->product_name }}</td>
                        <td>{{ $order->due_date }}</td>
                        @if ($order->order_type === 1)
                            <td>{{ $order->order_kilo }} kg <i class="bi bi-basket2-fill text-primary"></i></td>
                        @else
                            <td>{{ $order->order_quantity }} bags<i class="bi bi-handbag-fill text-primary"></i></td>
                        @endif
                        <td>₱ {{ $order->total_price }}</td>
                        <td>
                            @if ($order->status === 1)
                                <span class="badge text-bg-success">Completed</span>
                            @elseif($order->status === 2)
                                <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>

                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="mt-3 p-3">
        {{ $completed_orders->links() }}
    </div>
</div>
