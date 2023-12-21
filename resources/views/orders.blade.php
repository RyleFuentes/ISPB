<div x-data="{ toggle: 1 }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto lg:px-2">
        <div class="mb-3">
            <a x-on:click="toggle = 1" class="hover:cursor-pointer text-black   me-2" :class="toggle == 1 ? 'shadow-lg rounded text-white bg-black p-2' : '' "  x-transition>Orders Management</a>
            <a x-on:click="toggle = 2" class="hover:cursor-pointer text-black  me-2" :class="toggle == 2 ? 'shadow-lg rounded text-white bg-black p-2 ' : '' "  x-transition>Orders History</a>
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
