<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
class Users extends Component
{

    public $editing = false;
    public $edit_user_id;

    public function edit_user( $id)
    {
        $this->editing = true;
        $this->edit_user_id = $id;

        dd($this->edit_user_id);
    }


    public function render()
    {
        $users = User::all();
        return view('livewire.pages.users', compact('users'));
    }
}
