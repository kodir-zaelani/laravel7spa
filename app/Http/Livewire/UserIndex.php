<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    public $statusUpdate = false;
    public $paginate = 5;
    public $term;

    // Merender funsi reload page
    protected $listeners = [
        'userStored' => 'handleStored',
        'userUpdate' => 'handleUpdate',
    ];

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        return view('livewire.user-index', [
            'users' => $this->term === null ?
                User::latest()->paginate($this->paginate) :
                User::latest()->where('name', 'like', '%' . $this->term . '%')->paginate($this->paginate)
        ]);
    }

    public function getUser($id)
    {
        $this->statusUpdate = true;
        $user = User::find($id);
        // definisikan event listener emit
        $this->emit('getUser', $user);

    }   
    
    public function destroy($id)
    {
        if ($id) {
            $data = User::find($id);
            $data->delete();
            session()->flash('status', 'User was deleted!');

        }
    }

    public function handleStored($user)
    {
        // menampilkan flasmessage dengan session
        session()->flash('status', 'User ' .$user['name']. ' was stored!');
    }

    public function handleUpdate($user)
    {
        // menampilkan flasmessage dengan session
        session()->flash('status', 'User ' .$user['name']. ' was Updated!');
    }
}
