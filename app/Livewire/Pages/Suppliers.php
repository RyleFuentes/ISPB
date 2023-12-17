<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\AddSupplierForm;
use App\Mail\OrderEmail;
use App\Models\Supplier;
use Livewire\Attributes\Computed;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Products')]
class Suppliers extends Component
{
    use LivewireAlert;
    use WithPagination;

    public AddSupplierForm $form;

    public $test = [
        'test'
    ];

    protected $listeners = [
        'confirmedDelete'
    ];

    public function confirmedDelete()
    {
        $supplier = Supplier::findOrFail($this->delete_id);
        $delete = $supplier->delete();

        if($delete)
        {
            $this->dispatch('delete-success');
        }
    
    }

    #[On('delete-success')]
    public function DeleteSuccessMessage()
    {
        $this->alert('success', 'Warning', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => 'You have successfully deleted the user',
            'timerProgressBar' => true,
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'No',
           ]);
    }


    public $delete_id;
    public function deleteConfirm(Supplier $supplier)
    {
        $this->delete_id = $supplier->id;
        $this->alert('warning', 'Warning', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => 'Are you sure you want to delete this supplier?',
            'timerProgressBar' => true,
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmedDelete',
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'No',
           ]);
    }

    public $edit_id; 
    public $name, $email;
    public function editSupplier(Supplier $supplier)
    {
        $this->edit_id = $supplier->id;
        $this->name = $supplier->supplier_name;
        $this->email = $supplier->supplier_email;
        
    }

    public function updateSupplier()
    {
        $supplier = Supplier::findOrFail($this->edit_id);
        $emailVerif = $this->email == $supplier->supplier_email;

        if ($emailVerif)
        {
            $validated = $this->validate([
                'name' => 'required|min:3|max:30',
                'email'=> 'email|required',
            ]);
    
        }
        else
        {
            $validated = $this->validate([
                'name' => 'required|min:3|max:30',
                'email'=> 'email|required|unique:suppliers,supplier_email',
            ]);
    
        }

        $update = $supplier->update([
            'supplier_name' => $validated['name'],
            'supplier_email' => $validated['email'],
        ]);

        if ($update)
        {
            $this->reset();
            $this->dispatch('updated-supplier');
        }
       

    }

    public function cancel_edit()
    {
        $this->reset('edit_id');
    }

    public function sendOrderEmail(Supplier $supplier)
    {
       
       $send =  Mail::to($supplier->supplier_email)->send(new OrderEmail($supplier));
       if( $send )
       {
        
        $this->dispatch('email-sent');
       }
    }

    #[On('updated-supplier')]
    public function UpdatedMessage()
    {
        $this->alert('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => 'You have successfully updated the supplier information',
            'timerProgressBar' => true,
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Ok',
           ]);
    }

    #[On('email-sent')]
    public function EmailMessage()
    {
        $this->alert('success', 'Successful !!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => 'You have successfully sent the email to the supplier!',
            'timerProgressBar' => true,
           ]);
    }


    #[Computed()]
    public function suppliers()
    {
        return Supplier::paginate(10);
    }

    public function add_supplier()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('suppliers');
    }
}
