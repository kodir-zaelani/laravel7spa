<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactShow extends Component
{
    public $name;
    public $phone;
    public $contactId;
    public $contact;

    protected $listeners = [
        'getNewShow' => 'detailContact',
    ];


    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $post = Post::find($id);
        
        if($post) {
            $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
        }
    }
    public function render()
    {
        $contact = Contact::find($id);
        return view('livewire.contact-show', compact('contact'));
    }

    // public function detailContact($contact)
    // {
    //     $this->name = $contact['name'];
    //     $this->phone = $contact['phone'];
    //     $this->contactId = $contact['id'];
    // }
}
