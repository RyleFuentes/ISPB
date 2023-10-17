<div>
    <div class="d-flex" id="wrapper">
        @include('layout.sidebar')
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')
            <div>
                <div class="p-3 d-flex justify-content-end">
                    <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='toggle_off'>
                        Orders Page
                    </button>
                    <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='toggle_on'>
                        Orders History
                    </button>
                </div>
                <div class="container mt-5">
                    @if ($change_page == 1)
                        @include('livewire.components.order_management_table')
                    @else
                        @include('livewire.components.order_history_table')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{--  --}}
