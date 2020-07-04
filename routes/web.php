<?php
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::livewire('/logout', 'logout')->name('logout');


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
        Route::livewire('/', 'post.index')->name('post.index');
        Route::livewire('/all', 'post.all')->name('post.all');
        Route::livewire('/create', 'post.create')->name('post.create');
        Route::livewire('/edit/{id}', 'post.edit')->name('post.edit');
        Route::livewire('/show/{id}', 'post.show')->name('post.show');
        Route::livewire('/about', 'about');
    });
    
    // Route::get('/post/{post}', [
    //     'uses' => 'PostController@show',
    //     'as'   => 'post.show'
    // ]);
    
    Route::post('/post/{post}/comments', [
        'uses' => 'CommentController@store',
        'as'   => 'post.comments'
    ]);
    
    Route::get('/category/{category}', [
        'uses' => 'PostController@category',
        'as'   => 'category'
    ]);
    
    Route::get('/author/{author}', [
        'uses' => 'PostController@author',
        'as'   => 'author'
    ]);
    
    Route::get('/tag/{tag}', [
        'uses' => 'PostController@tag',
        'as'   => 'tag'
    ]);
});

