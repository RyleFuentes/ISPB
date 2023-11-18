<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileManagement as Profile_M;
use Illuminate\Support\Facades\Hash;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('index')]
#[Title('Profile')]

class Profile extends Component
{
    use WithFileUploads;


    public $user, $editing = false, $change_pass = false, $change_profile_image = false;
    public $profile_image_preview;
    public $update_name, $update_address, $update_number, $update_dateOfBirth, $update_profile_image;
    public $old_password, $old_password_confirmation, $new_password;

    public function mount()
    {
        
        $this->user = auth()->user();
        $this->update_name = $this->user->name;
        $this->update_address = $this->user->profile->address ?? null;
        $this->update_number = $this->user->profile->number ?? null;
        $this->update_dateOfBirth = $this->user->date_of_birth ?? null;
        $this->update_profile_image = $this->user->profile->profile_image ?? '';


        Profile_M::firstOrCreate([
            'userID' => $this->user->id,
            'address' => null,
            'number' => null,
            'date_of_birth' => null,
            'profile_image' => null,
        ]);
    }

    public function change_image()
    {
        $this->change_profile_image = true;

        
    }

    public function unchange_image()
    {
        $this->change_profile_image = false;
    }

    public function update_image()
    {
        $validated = $this->validate([
            'profile_image_preview' => 'required|image'
        ]);

        if($validated['profile_image_preview']);
        {
           $this->update_profile_image = $this->profile_image_preview->store('profile_pictures', 'public');
           
        }


        $update_photo = $this->user->profile->update([
            'profile_image' => $this->update_profile_image
        ]);

        if($update_photo)
        {
            $this->unchange_image();
            $this->reset('profile_image_preview');
            session()->flash('success', "You have successfully updated your profile picture");
        }
        

    }


    public function update_password()
    {
        $validated = $this->validate([
            'old_password' => 'required|confirmed',
            'old_password_confirmation' => 'required',
            'new_password' => 'required|min:8|max:12'
        ]);

        //? FETCHES THE CURRENT PASSWORD OF THE AUTHENTICATED USER
        $current_password = $this->user->password;

        //? CHECKS IF THE USER INPUT PASSWORD MATCHES WITH THE CURRENT PASSWORD OF AUTHENTICATED USER
        if(Hash::check($validated['old_password'], $current_password)) {
            
            $update = $this->user->update([
                'password'=> bcrypt($validated['new_password'])
            ]);

            if($update) {   
                session()->flash('success',"You have successfully changed your password!");
                $this->reset('old_password', 'old_password_confirmation', 'new_password');
                $this->change_pass = false;
            }

        }
        else{
            session()->flash('error',"Your password doesn't matches the one in our system.");
        }
        
    }

    //! METHODS FOR CHANGING THE VIEW FOR CHANGE PASS UI
    public function toggle_change_password()
    {
        $this->change_pass = true;
        
    }

    public function cance_change_pass()
    {
        $this->change_pass = false;
    }


    //! METHODS FOR CHANGING THE VIEW FOR EDIT PROFILE UI
    public function edit_profile()
    {
        $this->editing = true;
    }

    public function unedit_profile()
    {
        $this->editing = false;
    }


    //! METHOD FOR UPDATING THE PROFILE OF THE CURRENT AUTH USER
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
