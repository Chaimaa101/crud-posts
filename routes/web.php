<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\PostController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

Route::resource('posts',PostController::class);

Route::get('/{user}/posts',[DashbordController::class, 'userPosts'])->name('posts.user');

Route::middleware('auth')->group( function () {

    Route::get('/dashbord', [DashbordController::class, 'index'])->name('dashbord');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);
    Route::view('/login', 'auth.login')->name('login');
});


