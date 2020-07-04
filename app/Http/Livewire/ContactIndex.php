<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class ContactIndex extends Component
{
    use WithPagination; 
    
    public $statusUpdate;
    public $paginate = 5;
    public $term;

    // Merender funsi reload page
    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdate' => 'handleUpdate',
    ];

    protected $updatesQueryString = ['term'];
    

    // Cara Pertama
    // Menggunakan proferty public dengan mendefinisikan variabel $data di public
    // sesuaikan script pada contact-index.blade.php
    // Penulisan script dapat dilihat dibawah
    
    // public $data;
    // public function render()
    // {
    //     $this->data = Contact::latest()->get();
    //     return view('livewire.contact-index');
    // }


    //  Cara Kedua dengan 
    // menggunakan parameter kedua pada view contacts
    // Penulisan script dapat dilihat dibawah
    // sesuaikan script pada contact-index.blade.php

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => $this->term === null ?
                Contact::latest()->paginate($this->paginate) : 
                Contact::latest()->where('name', 'like', '%' . $this->term . '%')->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = 1;
        $contact = Contact::find($id);
        // definisikan event listener emit
        $this->emit('getContact', $contact);

    }

    public function getContactShow($id)
    {
        $this->statusUpdate = 2;
        $contact = Contact::find($id);
        // definisikan event listener emit
        $this->emit('getNewShow', $contact->id);

    }

    public function destroy($id)
    {
        if ($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('status', 'Contact was deleted!');

        }
    }

    public function handleStored($contact)
    {
        // menampilkan flasmessage dengan session
        session()->flash('status', 'Contact ' .$contact['name']. ' was stored!');
    }

    public function handleUpdate($contact)
    {
        Alert::success('Contact Update', 'Contact ' .$contact['name']. ' was Updated!');
        // menampilkan flasmessage dengan session
        // session()->flash('status', 'Contact ' .$contact['name']. ' was Updated!');
    }
}
