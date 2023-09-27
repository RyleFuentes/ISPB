<?php

namespace App\Livewire\Pages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Brand;
use Livewire\Component;


#[Layout('components.layouts.app')]
#[Title('Welcome')]
class Products extends Component
{
    public $brand='';
    public $addProduct=false;
    public $brand_chosen = '';

    public function addProductMode()
    {
        $this->addProduct=true;
    }

    public function addBrand()
    {
        $validated = $this->validate([
            'brand' => 'required'
        ]);
        


        $add = Brand::create([
            'brand_name' => $validated['brand']
        ]);

        if($add)
        {
            $this->dispatch('hide:add-brand-modal');
            $this->reset('brand');
        }
        session()->flash('success', 'You have successfully added a brand');
    }


    public function render()
    {

        $brands = Brand::all();
        return view('livewire.pages.products', compact('brands'));
    }
}
