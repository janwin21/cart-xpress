<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
*/

// Home Page
Route::get('/', function() {
    return inertia('CartXpressPage/Home');
})->name('pages.home');

// Login Page
Route::get('/login', function() {
    return inertia('CartXpressPage/Login');
})->name('pages.login');

// Register Page
Route::get('/register', function() {
    return inertia('CartXpressPage/Register');
})->name('pages.register');

// Customer Profile Page
Route::get('/profile/customer', function() {
    return inertia('CartXpressPage/CustomerProfile');
})->name('pages.profile.customer');
