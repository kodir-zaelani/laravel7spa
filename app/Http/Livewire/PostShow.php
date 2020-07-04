<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;

class PostShow extends Component
{
    public $title;
    public $body;
    public $postId;

    protected $listeners = [
        'getPost' => 'showPost',
    ];

    public function render()
    {
        // $title = "Detail Post";
        // $post->increment('view_count');
        // $postComments = $post->comments()->paginate(3);
        return view('livewire.post-show', compact('post', 'postComments', 'tags'));
    }

    
}
