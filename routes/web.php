<?php

use App\Livewire\CourseList;
use App\Livewire\CourseDetail;
use App\Livewire\ForumList;
use Illuminate\Support\Facades\Route;

Route::get('/', CourseList::class)->name('home');
Route::get('/course/{slug}', CourseDetail::class)->name('course.detail');
Route::get('/forum', ForumList::class)->name('forum');

// Authentication routes
Route::get('/login', function () {
    return redirect('/kaprodi/login');
})->name('login');

Route::get('/register', function () {
    return redirect('/kaprodi/login');
})->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/' . auth()->guard('web')->user()->role);
    })->name('dashboard');
});
