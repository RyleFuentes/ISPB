<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use App\Models\Brand;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Form;

class AddBrandsForm extends Form
{
    use WithFileUploads;

    #[Rule('required|min:3|max:20')]
    public $brand_name;

    #[Rule('required|image')]
    public $brand_image;

    public function addBrand()
    {
        $validated = $this->validate();

        if($this->brand_image)
        {
            $validated['brand_image'] = $this->brand_image->store('brand_images', 'public');
        }

        Brand::create($validated);
        $this->reset();
    }
}
