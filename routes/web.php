<?php
use Illuminate\Support\Facades\Route;


Route::group(['layout' => 'layouts.frontend'], function () {
    Route::livewire('/', 'frontend.home.index')->name('root');
    Route::livewire('/all', 'frontend.post.all')->name('post.all');
    Route::livewire('/show/{post}', 'frontend.post.show')->name('post.show');
    Route::livewire('/category/{slug}', 'frontend.category.show')->name('category.show');
    Route::livewire('/author/{slug}', 'frontend.author.show')->name('author.show');
    Route::livewire('/tag/{slug}', 'frontend.tag.show')->name('tag.show');
    Route::livewire('/about', 'frontend.about.index')->name('about.index');
});


Route::group(['middleware'=>'guest'], function () {
    Route::group(['layout' => 'layouts.app'], function () {
        Route::livewire('/login', 'frontend.auth.login')->name('login');
        Route::livewire('/register', 'frontend.auth.register')->name('register');
    });
    Route::livewire('/upload', 'uploadimage')->name('upload');
    // Group berdasrakan layouts
    
    Route::post('/post/{post}/comments', [
        'uses' => 'CommentController@store',
        'as'   => 'post.comments'
    ]);
    
});

Route::prefix('backend')->group(function () {
    Route::group(['middleware'=>'auth'], function () {
        Route::group(['layout' => 'layouts.app'], function () {
            Route::livewire('/home', 'home')->name('backend.home');
            Route::livewire('/contacts', 'contact-index')->name('backend.contacts');
            Route::livewire('/users', 'user-index')->name('backend.users');
        });
    });
});