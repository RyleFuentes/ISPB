<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
#[Title('Users')]
class Users extends Component
{
    use LivewireAlert;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pending_user_count = 0, $pending_user_mode = false;
    public $user_to_delete;
    public $user_to_accept;

    public $editing_id;
    public $editing = false;

    public $edit_name, $edit_email, $edit_password, $edit_role;

    public function mount()
    {
        $this->pending_user_count = User::where('role', 2)->count();
    }

    public function accept_user(User $user)
    {

        $user->update([
            'role' => 1,
        ]);


        $this->updatePendingUserCount();
        return back()->with('success', 'You have successfully accepted the user');
    }

    public function pending_user_mode_on()
    {
        $this->pending_user_mode = true;
    }

    public function pending_user_mode_off()
    {
        $this->pending_user_mode = false;
    }

    public function accept_confirm($id)
    {
        $this->user_to_accept = $id;
        $this->alert('warning', 'User admission', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'text' => 'are you sure you want to accept this user?',
            'showConfirmButton' => true,
            'onConfirmed' => 'add_account',
            'confirmButtonText' => 'delete',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'cancel',
           ]);
    }

    public function add_account()
    {
        $user = User::findOrFail($this->user_to_accept);
        $user->update([
            'role' => 1,
        ]);

        $this->reset('user_to_accept');
        $this->updatePendingUserCount();
    }



    public function delete_confirm(User $user)
    {
        $this->user_to_delete = $user->id;
        $this->alert('warning', 'WARNING', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => 'delete_user',
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'confirmButtonText' => 'delete',
            'text' => 'Are you sure you want to delete this item?',
            'timerProgressBar' => true,
        ]);
    }

    public function delete_user()
    {
        $user = User::findOrFail($this->user_to_delete);
        if ($user) {
            $user->delete();
            session()->flash('success', 'You have successfully deleted the user');
            $this->updatePendingUserCount();
        }

        $this->dispatch('deleted');
    }

    #[On('deleted')]
    public function delete_message()
    {
        $this->alert('success', 'Successfull', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'text' => 'You have successfully deleted the user',
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'confirmButtonText' => 'delete',
            'showCancelButton' => false,
            'onDismissed' => '',
            'cancelButtonText' => 'cancel',
           ]);
    }


    protected $listeners = [
        'delete_user',
        'add_account',
        'Cancel'
    ];

    public function updatePendingUserCount()
    {
        $this->pending_user_count = User::where('role', 2)->count();
    }

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

        if ($user->email == $this->edit_email) {
            $validated = $this->validate([
                'edit_name' => 'required',

            ]);


            $user->update([
                'name' => $validated['edit_name'],
                'email' => $user->email,
                'role' => $this->edit_role,
                'password' => $user->password,
            ]);
        } else {
            $validated = $this->validate([
                'edit_name' => 'required',
                'edit_email' => 'required|email|unique:users,email,',
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
        $users = User::where('role', '!=', 2)->paginate(10);
        $pending_users = User::where('role', 2)->get();
        return view('users', compact('users', 'pending_users'));
    }
}
