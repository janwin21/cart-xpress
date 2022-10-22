<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopsController;
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

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login Page
Route::get('/login', [HomeController::class, 'login'])->name('login');

// Register Page
Route::get('/register', [HomeController::class, 'register'])->name('register');

// Profile Page
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

// Shop Form Page
Route::get('/form/shop', function() {
    return inertia('CartXpressPage/ShopForm');
})->name('pages.form.shop');

// checkout Page
Route::get('/checkout', function() {
    return inertia('CartXpressPage/Checkout');
})->name('pages.checkout');

// CUSTOMER
Route::resource('customers', CustomersController::class);

// PRODUCTS
Route::resource('products', ProductsController::class);

// SHOP
Route::resource('shops', ShopsController::class);