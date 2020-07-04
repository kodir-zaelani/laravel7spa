<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Illuminate\Support\Str;

class UserUpdate extends Component
{
    public $name;
    public $bio;
    public $userId;

    protected $listeners = [
        'getUser' => 'showUser',
    ];

    public function render()
    {
        return view('livewire.user-update');
    }

    public function showUser($user)
    {
        $this->name = $user['name'];
        $this->bio = $user['bio'];
        $this->userId = $user['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:2',
            'bio' => 'string|max:255',
        ]);

        if ($this->userId) {
            $user = User::find($this->userId);
            $user->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'bio' => $this->bio
            ]);

            $this->resetInput();

            $this->emit('userUpdate', $user);
        }

    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->name = null;
        $this->bio = null;
    }
}
