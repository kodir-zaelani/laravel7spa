<?php

namespace App\Http\Livewire\Post;

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    public $paginate = 6;
    public $term;

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        $posts = Post::with('author', 'category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->filter(request()->only(['term', 'year', 'month']))
                        ->paginate($this->paginate);
        return view('livewire.post.all', compact('posts'));
    }
}
