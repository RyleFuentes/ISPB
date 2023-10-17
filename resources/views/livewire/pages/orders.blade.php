<div>
    <div class="d-flex" id="wrapper">
        @include('layout.sidebar')
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')
            <div>
                <div class="container">
                    <button wire:click='toggle_off' class="btn btn-info">page 1</button>
                    <button wire:click='toggle_on' class="btn btn-warning">page 2</button>

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
