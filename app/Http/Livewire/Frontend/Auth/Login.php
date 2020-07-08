<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'email'   => '',
        'password'=> '',
    ];


    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);

        Auth::attempt($this->form);
            
        $status = session()->flash('status', 'Welcome !');
        return redirect(route('home', $status));

    }
    public function render()
    {
        return view('livewire.frontend.auth.login');
    }
}
