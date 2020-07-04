<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 6;

    public function index()
    {
        $date = Carbon::now();
        $posts = Post::with('author', 'tags', 'category', 'comments')
                    ->latestFirst()
                    ->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->take(6)
                    // ->paginate($this->limit);
                    ->get();

        return view('frontend.kz.index', compact('posts', 'date'));
    }

    public function category(Category $category)
    {
        $title = "Category";
        $categoryName = $category->title;

        $posts = $category->posts()
                          ->with('author', 'tags', 'comments')
                          ->latestFirst()
                          ->published()
                          ->take(6)
                        ->paginate($this->limit);
        
        return view("frontend.kz.allpost", compact('posts', 'categoryName', 'title'));
    }

    public function tag(Tag $tag)
    {
        $title = "Tagged";
        $tagName = $tag->title;

        $posts = $tag->posts()
                          ->with('author', 'category', 'comments')
                          ->latestFirst()
                          ->published()
                          ->take(6)
                    ->paginate($this->limit);
        
        return view("frontend.kz.allpost", compact('posts', 'tagName', 'title'));
    }

    // list berdasrkan author belum selesai
    public function author(User $author)
    {
        $title = "Author";
        $authorName = $author->name;
        $posts = $author->posts()
                        ->with('category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->take(6)
                        ->paginate($this->limit);
        
        return view("frontend.kz.allpost", compact('posts', 'authorName', 'title'));
        
    }

    public function show(Post $post)
    {
        $title = "Detail Post";
        $post->increment('view_count');
        $postComments = $post->comments()->paginate(3);

        return view('frontend.kz.show', compact('post', 'postComments', 'tags'));
    }
    

    public function allposts(Post $posts)
    {
        $posts = Post::with('author', 'category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->filter(request()->only(['term', 'year', 'month']))
                        ->paginate($this->limit);
        return view('frontend.kz.allpost', compact('posts'));
    }

    public function contact()
    {
       
        // return view('frontend.kz.contact');
    }

}
