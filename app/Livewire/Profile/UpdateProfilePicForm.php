<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UpdateProfilePicForm extends Component
{

    use WithFileUploads;

    #[Rule('required|image', as:"Profile image")]
    public $profilePic; 

    public function mount()
    {
        $user = Auth::user();

        if(!$user->profile)
        {
            $user->profile()->create([
                'profile_image' => null,
            ]);
        }

    }
    
    public function update_pic()
    {
        $validated = $this->validate();

        if($this->profilePic)
        {
           $validated['profilePic'] = $this->profilePic->store('profile_image','public');
        }

        Auth::user()->profile()->update([
            'profile_image' => $validated['profilePic'],
        ]);
        $this->redirect('profile', navigate:true);
        session()->flash('success', 'You have updated your profile photo');
        $this->reset();

    }
    public function render()
    {
        return view('livewire.profile.update-profile-pic-form');
    }
}
