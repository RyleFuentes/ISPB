<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $editing = false;
    public $edit_user_id;

    public $edit_name, $edit_email, $edit_password, $edit_role;

    public function edit_user($id)
    {
        $this->editing = true;
        $user = User::findOrFail($id);
        $this->edit_name = $user->name;
        $this->edit_email = $user->email;
        $this->edit_password = $user->password;
        $this->edit_role = $user->role;
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
