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

class Edit extends Component
{
    use WithPagination;
    public $postId;
    public $title;
    public $body;
    public $imageurl;


    /**
    * mount or construct function
    */
    public function mount($id)
    {
        $post = Post::find($id);
                
        if($post) {
            $this->postId   = $post->id;
            $this->title    = $post->title;
            $this->body  = $post->body;
            $this->imageurl  = $post->imageUrl;
        }
    }
    public function render()
    {
        return view('livewire.post.edit', compact('post'));
    }
}
