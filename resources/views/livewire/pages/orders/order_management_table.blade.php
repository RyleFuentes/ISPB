<div>
    @include('livewire.messages.message')
    <div class="card d-flex justify-content-center align-items-center table-responsive" style="z-index: 0;">
        <div class="mb-4 px-4 mt-3 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary btn-sm rounded-pill me-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus me-2 text-light"></i>Add Order
                </button>

              
            </div>
        </div>

        <div style="margin: 20px auto; width: 100%;">
            @if ($pending_orders->count() < 1)
                <p class="p-3">There are no pending orders at the moment </p>
            @else
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="fw-semibold">

                            <td scope="col" class="text-dark">Ordered Product</td>
                            <td scope="col" class="text-dark">Delivery Date</td>
                            <td scope="col" class="text-dark">Amount</td>
                            <td scope="col" class="text-dark">Total Price</td>
                            <td scope="col" class="text-dark">Recipient</td>
                            <td scope="col" class="text-dark">Status</td>
                            <td scope="col" class="text-dark">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_orders as $order)
                            @if ($order->status === 0)
                                <tr>

                                    <td>{{ $order->product->product_name }}</td>
                                    <td>{{ $order->due_date }}</td>
                                    @if ($order->order_type === 1)
                                        <td>{{ $order->order_kilo }} <i class="bi bi-basket2-fill text-primary"></i>
                                        </td>
                                    @else
                                        <td>{{ $order->order_quantity }} <i class="bi bi-handbag-fill text-primary"></i>
                                        </td>
                                    @endif

                                    <td>₱ {{ $order->total_price }}</td>
                                    <td>{{ $order->recipient }}</td>
                                    <td><span class="badge text-bg-warning">Pending</span></td>
                                    <td class="font-size: 12px">

                                        <div class="dropstart">
                                            <button class="dropdown-toggle action" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu" style="width: 250px; font-size: 13px">
                                                <li wire:click.prevent='completeOrder({{ $order->order_id }})'>
                                                    <i class="fa-solid fa-check"></i>
                                                    Complete order
                                                </li>
                                                <li wire:click.prevent='cancelOrder({{ $order->order_id }})'
                                                    class="mt-2">
                                                    <i class="fa-solid fa-ban"></i>
                                                    Cancel
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>


                </table>

                <div class="mt-3 p-3">
                    {{ $pending_orders->links() }}
                </div>
            @endif

        </div>
    </div>
    @include('livewire.modals.add_orders_modal')
</div>
