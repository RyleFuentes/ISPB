<div>
    @include('livewire.messages.message')
    <div class="card d-flex justify-content-center align-items-center table-responsive" style="z-index: 0;">
        <div class="mb-4 px-4 mt-3 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary btn-sm rounded-pill me-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus me-2 text-light"></i>Add Order
                </button>

                @if ($pending_orders->count() >= 1)
                    <form action="" class="form">
                        <div class="d-flex justify-content-center align-items-center">
                            <input wire:model.live='search' placeholder="Search" id="search" type="search"
                                class="form-control border-secondary rounded-3">
                            <button class="">
                                <i class="ms-3 fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <div style="margin: 20px auto; width: 100%;">
            @if ($pending_orders->count() < 1)
                <p class="p-3">There are no pending orders at the moment </p>
            @else
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="fw-semibold">

                            <td scope="col" class="text-secondary">Ordered Product</td>
                            <td scope="col" class="text-secondary">Delivery Date</td>
                            <td scope="col" class="text-secondary">Amount</td>
                            <td scope="col" class="text-secondary">Total Price</td>
                            <td scope="col" class="text-secondary">Recipient</td>
                            <td scope="col" class="text-secondary">Status</td>
                            <td scope="col" class="text-secondary">Actions</td>
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
                                    <td>
                                        <button wire:click.prevent='completeOrder({{ $order->order_id }})'
                                            class="btn btn-primary btn-sm">Complete order</button>
                                        <button wire:click.prevent='cancelOrder({{ $order->order_id }})'
                                            class="btn btn-danger btn-sm">Cancel</button>
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
