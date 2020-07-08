<?php
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::livewire('/logout', 'logout')->name('logout');
// Global View Composer frontend + Beckend
// View::composer('*', function($view) {
//     $global_categories = \App\Models\Category::latest()->take(6)->get();
//     $view->with('global_categories', $global_categories);
// });

Route::group(['middleware'=>'auth'], function () {
    Route::livewire('/home', 'home')->name('home');
    Route::livewire('/contacts', 'contact-index')->name('contacts');
    Route::livewire('/users', 'user-index')->name('users');
});

Route::group(['middleware'=>'guest'], function () {
    Route::livewire('/login', 'login')->name('login');
    Route::livewire('/register', 'register')->name('register');
    Route::livewire('/upload', 'uploadimage')->name('upload');
    // Group berdasrakan layouts
    Route::group(['layout' => 'layouts.frontend.main'], function () {
        Route::livewire('/', 'frontend.home.index')->name('frontend.home.index');
        Route::livewire('/all', 'frontend.post.all')->name('frontend.post.all');
        Route::livewire('/show/{post}', 'frontend.post.show')->name('frontend.post.show');
        Route::livewire('/category/{slug}', 'frontend.category.show')->name('frontend.category.show');
        Route::livewire('/author/{slug}', 'frontend.author.show')->name('frontend.author.show');
        Route::livewire('/tag/{slug}', 'frontend.tag.show')->name('frontend.tag.show');
        Route::livewire('/about', 'about');
    });
    
    Route::post('/post/{post}/comments', [
        'uses' => 'CommentController@store',
        'as'   => 'post.comments'
    ]);
    
});

