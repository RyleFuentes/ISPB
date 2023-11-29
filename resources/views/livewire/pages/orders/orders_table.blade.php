<?php

namespace App\Livewire\Pages;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Volt\Component;

new class extends Component {
    public $products = [];

    public function mount()
    {
        $this->products = Product::all();
    }
};

?>

<table class="table table-striped table-hover " style="width: 100%">
        <thead>
            <tr class=" fw-semibold">
                <td scope="col" class="text-secondary text-center">Product Name</td>
                <td scope="col" class="text-secondary text-center">Quantity</td>
                <td scope="col" class="text-secondary text-center">Retail price</td>
                <td scope="col" class="text-secondary text-center">Wholesale price</td>
                <td scope="col" class="text-secondary text-center">Action</td>
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
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#viewProduct">
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