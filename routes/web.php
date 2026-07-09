<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/services', function () {
    return view('frontend.services');
})->name('services');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/blog/detail', function () {
    return view('frontend.blog-detail');
})->name('blog.detail');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::get('/register', function () {
    return view('frontend.register');
})->name('register');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/services', function () {
        return view('admin.services');
    })->name('admin.services');

    Route::get('/blogs', function () {
        return view('admin.blogs');
    })->name('admin.blogs');

    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});

/*
|--------------------------------------------------------------------------
| User Portal Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('user.profile');

    Route::get('/services', function () {
        return view('user.services');
    })->name('user.services');

    Route::get('/blogs', function () {
        return view('user.blogs');
    })->name('user.blogs');

    Route::get('/password', function () {
        return view('user.password');
    })->name('user.password');
});

