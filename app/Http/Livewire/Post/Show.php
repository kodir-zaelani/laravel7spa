<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;

class Show extends Component
{
    use WithPagination;
    public $postId;
    public $title;
    public $body;
    public $imageurl;


    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function getPostProperty()
    {
        return Post::find($this->postId);
    }

    public function render()
    {
        // $title = "Detail Post";
        // $post->increment('view_count');
        // $postComments = $post->comments()->paginate(3);

        return view('livewire.post.show');
    }
}
