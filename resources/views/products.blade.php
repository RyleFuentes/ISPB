<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div>
        <div class="mb-4">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#addBrand">
                    <i class="fa fa-plus-circle me-2 text-light"></i>Add Brand
                </button>
                <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='addProductMode'>
                    <i class="fa fa-plus-circle me-2 text-light fw-semibold"></i>Add Products
                </button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (!$addProduct)
                    <table class="table table-hover " style="width: 100%; font-size: 15px">
                        <thead>
                            <tr class="fw-semibold">
                                <td scope="col" class="text-secondary text-center">Product Name</td>
                                <td scope="col" class="text-secondary text-center">Quantity</td>
                                <td scope="col" class="text-secondary text-center">Retail price</td>
                                <td scope="col" class="text-secondary text-center">Wholesale price</td>
                                <td scope="col" class="text-secondary text-center">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="fw-semibold" wire:key='{{ $product->product_id }}'>
                                    <td class="text-center">{{ $product->product_name }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">50</td>
                                    <td class="text-center">1200</td>
                                    <td class="text-center">
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#viewProduct">
                                            <i class="fas fa-eye fs-6 text-success"></i>
                                        </button>
                                        <button wire:click='' class="btn text-primary mx-1" style="cursor: pointer">
                                            <i class="fas fa-edit fs-6"></i>
                                        </button>
                                        <button wire:click='' class="btn mx-1 text-danger" style="cursor: pointer">
                                            <i class="fas fa-trash fs-6"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- @include('livewire.modals.view_product_modal') --}}
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="p-6 text-gray-900">
                        @include('livewire.pages.products.add_products')
                    </div>
                @endif

                @include('livewire.modals.add-brand-modal')
                @push('dismiss-add-brand-script')
                    <script>
                        window.AddEventListener('hide:add-brand-modal', function() {
                            $('#addBrand').modal('hide');
                        })
                    </script>
                @endpush
            </div>
        </div>
    </div>
</div>
