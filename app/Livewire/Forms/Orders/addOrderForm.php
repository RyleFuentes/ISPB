<?php

namespace App\Livewire\Forms\Orders;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class addOrderForm extends Form
{


    
    #[validate('required')]
    public $brand;
    
    #[validate('required')]
    public $product;

    #[validate('required|min:3|max:30')]
    public $recipient;

    #[validate('required')]
    public $order_qty;


    public $total_price;

    #[validate('required|date')]
    public $deliver_date;

 

    public function store()
    {
        $this->validate();
        dd('clicked');
    }
}
