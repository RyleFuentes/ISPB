<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Batch;
use Livewire\Attributes\Rule;

class EditFormBatch extends Form
{
    #[Rule('required')]
    public $quantity;
    #[Rule('date|required')]
    public $exp_date;

    public $success = false;

    public function set_edit_values_batch($batch_id)
    {
        $batch = Batch::findOrFail($batch_id);
        $this->quantity = $batch->quantity;
        $this->exp_date = $batch->expiration_date;
    }

    public function update_batch($batch_id)
    {
       
       $validated = $this->validate();
        $batch = Batch::findOrFail($batch_id);
       
        $update = $batch->update([
            'quantity' => $this->quantity,
            'expiration_date' => $this->exp_date,
        ]);

        if($update)
        {
            $this->reset();
            $this->success = true;
        }

      
    }
}
