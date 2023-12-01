<div class="bg-white rounded shadow-sm container p-3">
    @include('livewire.messages.message')
    <h3>Order history</h3>

            <table class="table table-striped table-hover">
                <thead>
                    <tr class="fw-semibold">
                        
                        <td scope="col" class="text-secondary">Ordered Product</td>
                        <td scope="col" class="text-secondary">Delivery Date</td>
                        <td scope="col" class="text-secondary">Quantity(bags)</td>
                        <td scope="col" class="text-secondary">Total Price</td>
                        <td scope="col" class="text-secondary">Status</td>
                        <td scope="col" class="text-secondary">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($completed_orders as $order)
                        @if ($order->status === 1 || $order->status === 2)
                            <tr>
                                
                                <td>{{$order->product->product_name}}</td>
                                <td>{{$order->due_date}}</td>
                                <td>{{$order->order_quantity}}</td>
                                <td>₱ {{$order->total_price}}</td>
                                <td>
                                    @if ($order->status === 1)
                                        <span class="text-success">Completed</span>
                                    @elseif($order->status === 2)
                                        <span class="text-warning">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-secondary btn-sm">test</button>
                                </td>
                            </tr>
                        @endif
                        
                    @endforeach

                   
                </tbody>

    </table>

    <div class="mt-3 p-3">
        {{$completed_orders->links()}}
    </div>
</div>