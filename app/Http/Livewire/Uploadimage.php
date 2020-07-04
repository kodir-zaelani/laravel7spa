<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Uploadimage extends Component
{
    use WithFileUploads;
    public $image;

    public function render()
    {
        return view('livewire.uploadimage');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
    }
    
    public function save()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);

        $this->image->store('images');
    }
}
