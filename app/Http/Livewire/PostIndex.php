<?php

namespace App\Http\Livewire;

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $term;

    public function render()
    {
        $date = Carbon::now();
        $posts = Post::with('author', 'tags', 'category', 'comments')
                    ->latestFirst()
                    ->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->take(6)
                    // ->paginate($this->limit);
                    ->get();
        return view('livewire.post-index', compact('posts', 'date'));
    }

    public function getPost($id)
    {
        $this->statusUpdate = true;
        $post = Post::find($id);
        // definisikan event listener emit
        $this->emit('getPost', $post);

    } 
}
