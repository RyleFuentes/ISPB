<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>


    <div class="mb-3 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addSuppliersModal">Add
            Suppliers</button>
    </div>

    <div class="py-12 bg-white shadow-sm rounded p-3">
        @if (!$this->suppliers())
            no suppliers at the moment
        @else
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($this->suppliers() as $supplier)
                        <tr wire:key='{{ $supplier->id }}'>
                            @if ($edit_id && $edit_id == $supplier->id)
                                <td>
                                    <input wire:model='name' type="text" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input wire:model='email' type="email" class="form-control">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                                <td>


                                   <button class="btn btn-warning" wire:click='updateSupplier'>update</button>
                                   <button class="btn btn-primary" wire:click='cancel_edit'>cancel</button>
                                </td>
                            @else
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->supplier_email }}</td>
                                <td>


                                    <button wire:loading.attr='disabled'
                                        wire:click='sendOrderEmail({{ $supplier->id }})'
                                        class="btn btn-sm btn-primary">send order email <i
                                            class="bi bi-send-plus"></i></button>
                                    <button wire:loading.attr='disabled' wire:click='editSupplier({{ $supplier->id }})'
                                        class="btn btn-sm btn-warning">edit</button>
                                    <button wire:loading.attr='disabled' wire:click='deleteConfirm({{$supplier->id}})' class="btn btn-sm btn-danger">delete</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>



            <div class="mt-3 p-3">
                {{$this->suppliers()->links()}}
            </div>

        @endif


    </div>


    @include('livewire.modals.add_suppliers_modal')
</div>
