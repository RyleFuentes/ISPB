<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>


    <div class="mb-3 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addSuppliersModal">
            <i class="fas fa-plus"></i>
            Add Suppliers</button>
    </div>

    <div class="py-12 bg-white shadow-sm rounded">
        @if ($this->suppliers()->count() < 1)
            <div class="p-3"> 
                no suppliers at the moment
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @foreach ($this->suppliers() as $supplier)
                        <tr wire:key='{{ $supplier->id }}' cl>
                            @if ($edit_id && $edit_id == $supplier->id)
                                <td>
                                    <input wire:model='name' type="text" class="modal-input-field form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input wire:model='email' type="email" class="modal-input-field form-control">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>


                                    <button class="btn btn-warning" wire:click='updateSupplier'>Update</button>
                                    <button class="btn btn-danger" wire:click='cancel_edit'>Cancel</button>
                                </td>
                            @else
                                <td class="text-center">{{ $supplier->supplier_name }}</td>
                                <td class="text-center">{{ $supplier->supplier_email }}</td>
                                <td class="text-center">

                                    <div wire:loading class="d-flex">
                                        <div wire:loading class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>

                                        <div wire:loading class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>

                                        <div wire:loading class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div wire:loading.remove>

                                        <button id="sendOrderEmailButton" wire:loading.attr="disabled"
                                            wire:target="sendOrderEmail"
                                            wire:click="sendOrderEmail({{ $supplier->id }})"
                                            class="btn btn-sm btn-primary px-3">Send order email <i
                                                class="bi bi-send-plus"></i></button>
                                        <button class="btn btn-warning px-4"
                                            wire:click='editSupplier({{ $supplier->id }})'
                                            wire:loading.attr='disabled'>Edit
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger px-4"
                                            wire:click='deleteConfirm({{ $supplier->id }})'
                                            wire:loading.attr='disabled'> Delete
                                            <i class="fas fa-trash"></i>

                                        </button>
                                    </div>



                                    {{-- <button id="editSupplierButton" wire:loading.attr="disabled" wire:target="editSupplier" wire:click="editSupplier({{ $supplier->id }})"
                                        class="btn btn-sm btn-warning">edit</button>
                                    <button id="deleteConfirmButton" wire:loading.attr="disabled" wire:target="deleteConfirm" wire:click="deleteConfirm({{ $supplier->id }})"
                                        class="btn btn-sm btn-danger">delete</button> --}}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>



            <div class="mt-3 p-3">
                {{ $this->suppliers()->links() }}
            </div>

        @endif


    </div>


    @include('livewire.modals.add_suppliers_modal')
</div>
