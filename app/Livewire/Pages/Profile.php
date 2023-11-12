<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileManagement as Profile_M;


#[Layout('index')]
#[Title('Profile')]

class Profile extends Component
{
    public $user, $editing = false;
    public $update_name, $update_address, $update_number, $update_dateOfBirth;

    public function mount()
    {
        
        $this->user = auth()->user();
        $this->update_name = $this->user->name;
        $this->update_address = $this->user->profile->address ?? null;
        $this->update_number = $this->user->profile->number ?? null;
        $this->update_dateOfBirth = $this->user->date_of_birth ?? null;


        $profile = Profile_M::firstOrCreate([
            'userID' => $this->user->id,
            'address' => null,
            'number' => null,
            'date_of_birth' => null,
            'profile_image' => null,
        ]);
    }


    public function edit_profile()
    {
        $this->editing = true;
    }

    public function unedit_profile()
    {
        $this->editing = false;
    }

    public function update_profile()
    {
       


        $validated = $this->validate([
            'update_name' => 'required',
            'update_address' => 'required',
            'update_number' => 'required|min:11|max:11',
            'update_dateOfBirth' => 'required',
        ]);


        $update = $this->user->update([
            'name' => $validated['update_name']
        ]);
        $create_profile = Auth::user()->profile->update([
            'address' => $validated['update_address'],
            'date_of_birth' => $validated['update_dateOfBirth'],
            'number' => $validated['update_number']
        ]);

        if($update && $create_profile)
        {
            $this->editing= false;
            $this->reset('update_name', 'update_address', 'update_dateOfBirth', 'update_number');
            session()->flash('success', 'You have successfully update your profile!');

        }
        else
        {
            session()->flash('fail', 'Something went wrong, try again!');
        }
    }


    public function render()
    {
       $user = $this->user;


        return view('livewire.pages.profile', ([
            'user'=> $user,
            'address' => $user->profile('address'),
            'number' => $user->profile('number'),
            'date_of_birth' => $user->profile('date_of_birth'),

        ]));
    }
}
