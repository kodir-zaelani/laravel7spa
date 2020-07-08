<?php

namespace App\Http\Livewire\Frontend\Auth;

use App\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
   
    public function submit()
    {
        $this->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $status = session()->flash('status', 'Pleace Sign in!');

        return redirect(route('login', $status));
    }

    public function render()
    {
        return view('livewire.frontend.auth.register');
    }
}
