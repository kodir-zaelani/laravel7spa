<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Register extends Component
{
    // public $form = [
    //     'name'                  => '',
    //     'email'                 => '',
    //     'password'              => '',
    //     'password_confirmation' => '',
    // ];

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

        // dd($this->form);
    }
    
    public function render()
    {
        return view('livewire.register');
    }
}
