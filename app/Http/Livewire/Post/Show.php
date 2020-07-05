<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;

class Show extends Component
{
    /**
     * public variable
     */
    public $segment;
    public $post_title;
    public $post_body;
    public $post_category;
    public $post_tags;
    public $post_comments;
    public $post_image;

    public $post;

    public function mount(Post $post)
    {
        $post->increment('view_count');

        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
