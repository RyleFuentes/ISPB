<div x-data="{ toggle: 1 }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto lg:px-2">
        <div class="text-end me-3 mb-3">
            <button x-on:click="toggle = !toggle" class="btn btn-primary btn-sm rounded-pill me-2" x-text="toggle ? 'Orders history' : 'Orders page'" x-transition></button>
        </div>
        <div class="overflow-hidden mt-2 sm:rounded-lg">

            <div :class="toggle == 1 ? '' : 'hidden'" x-transition>
               <livewire:pages.orders.order-management />

            </div>
            <div :class="toggle == 2 ? '' : 'hidden'" x-transition>

                <livewire:pages.orders.order-history />
            </div>



        </div>
    </div>
    @include('livewire.pages.orders.orders-history-generate-report')
</div>
