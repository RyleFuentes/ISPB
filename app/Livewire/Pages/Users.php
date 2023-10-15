<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $editing_id;
    public $editing = false;

    public $edit_name, $edit_email, $edit_password, $edit_role;




    public function edit_user($id)
    {
        $this->editing = true;
        $user = User::findOrFail($id);
        $this->editing_id = $user->id;
        //? ----- SETTING THE PUBLIC VARIABLES TO THESE ------
        
        $this->edit_name = $user->name;
        $this->edit_email = $user->email;
        $this->edit_password = $user->password;
        $this->edit_role = $user->role;
    }

    public function save_edit($id)
    {
        $user = User::findOrFail($id);

        if($user->email == $this->edit_email)
        {
            $validated = $this->validate([
                'edit_name' => 'required',
               
            ]);


            $user->update([
                'name' => $validated['edit_name'],
                'email' => $user->email,
                'role' => $this->edit_role,
                'password' => $user->password,
            ]);
    
    
        }
        else
        {
            $validated = $this->validate([
                'edit_name' => 'required',
                'edit_email' => 'required|email|unique:users,email,' ,
            ]);

            $user->update([
                'name' => $validated['edit_name'],
                'email' => $validated['edit_email'],
                'role' => $this->edit_role,
                'password' => $user->password,
            ]);
        }
      
       
        return redirect()->route('users');
        $this->reset('edit_name', 'edit_email', 'edit_password', 'edit_role');
    }

    public function cancel_edit()
    {
        $this->editing = false;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.pages.users', compact('users'));
    }
}
