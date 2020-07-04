<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class UserCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $bio;
    // public $image;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'bio' => 'string|max:255',
            // 'image' => 'image|max:1024|mimes:jpg,jpeg,bmp,png', // 1MB Max
        ]);

        $user = User::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'email' => $this->email,
            'password' => $this->password,
            'bio' => $this->bio,
            
            // 'email_verified_at' => Carbon::now(),
        ]);

       
        // memamnggil fungsi reset form cara pertama
        $this->resetInput();

        // Emit seperti di vuejs Fungsi reload page
        $this->emit('userStored', $user);

         // Mereset isi form cara kedua
        //  $this->name = '';
        //  $this->email = '';
    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->bio = null;
        $this->password_confirmation = null;
    }
}
