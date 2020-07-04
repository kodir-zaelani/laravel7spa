<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:2',
            'phone' => 'required|max:15'
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

       
        // memamnggil fungsi reset form cara pertama
        $this->resetInput();

        // Emit seperti di vuejs Fungsi reload page
        $this->emit('contactStored', $contact);

         // Mereset isi form cara kedua
        //  $this->name = '';
        //  $this->phone = '';
    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
