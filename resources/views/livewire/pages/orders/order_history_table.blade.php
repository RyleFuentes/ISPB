<div class="bg-white rounded shadow-sm container p-3">
    @include('livewire.messages.message')
    <h3>Order history</h3>

    <livewire:order-history-table />
    <div class="mt-3 p-3">
        {{ $completed_orders->links() }}
    </div>
</div>
