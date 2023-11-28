<?php

namespace App\Livewire\Forms\Orders;

use App\Models\Order;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;
class addOrderForm extends Form
{
    #[Rule('required')]
    public $brand;

    #[Rule('required')]
    public $type_order;

    #[Rule('required')]
    public $product;

    #[Rule('required|min:3|max:30')]
    public $recipient;

    #[Rule('required')]
    public $order_qty;
    public $total_price;

    #[Rule('required|date')]
    public $deliver_date;



    public function calculate($type, $prod, $qty)
    {
        $product = Product::findOrFail($prod);

        if ($type === '1') {
            return $product->retail_price * $qty;
        } elseif ($type === '2') {
            return $product->wholesale_price * $qty;
        }

        // Add a default value or handle other cases as needed
        return 0;
    }

    public function store()
    {
        $validated = $this->validate();
        $product = Product::findOrFail($validated['product']);

        $this->total_price = $this->calculate($validated['type_order'], $validated['product'], $validated['order_qty']);
        $store = $product->orders()->create([
            'order_quantity' => $validated['order_qty'],
            'due_date' => $validated['deliver_date'],
            'recipient' => $validated['recipient'],
            'total_price' => $this->total_price,
        ]);

        if ($store) {
            session()->flash('success', 'well done success');
        }
    }
}
