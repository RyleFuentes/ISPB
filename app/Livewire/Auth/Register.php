<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

#[Layout('index')]
#[Title('Register')]
class Register extends Component
{

    #[Rule('required|max:50')]
    public $name ='';
    #[Rule('required|email|unique:users')]
    public $email ='';
    #[Rule('required|confirmed')]
    public $password ='';
    #[Rule('required')]
    public $password_confirmation ='';

    public function register()
    {
        $validated = $this->validate(
        );

        $add = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if ($add) {
            return redirect('/')->with('create_success', 'Account creation successful, account is now being process!');
        }        

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
