<?php

namespace App\Livewire\Pages\Suppliers;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Categories extends Component
{
    #[Rule('required|min:3')]
    public $name;

    public function store()
    {
        $validated = $this->validate();



       $update = Category::create([
        'category' => $validated['name']
       ]);

        if($update)
        {
            session()->flash('modal_success', "You have successfully added a new category");
        }
        else
        {
            session()->flash('error', "Something went wrong, try again...");
        }
        $this->reset('name');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.pages.suppliers.categories' , compact('categories'));
    }
}
