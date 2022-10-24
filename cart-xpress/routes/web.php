<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
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
Route::get('/profile/{id}', [HomeController::class, 'visitUserCustomer'])->name('profile.visit');

// Checkout & Order Page
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/checkout/order', [HomeController::class, 'order'])->name('order');

// CUSTOMER
Route::resource('customers', CustomersController::class);

// PRODUCTS
Route::resource('products', ProductsController::class);

// SHOP
Route::resource('shops', ShopsController::class);

// CATEGORIES
Route::resource('categories', CategoriesController::class);

// EMPLOYEE
Route::resource('employees', EmployeesController::class);
Route::post('employees/assign/{employeeID}/{customerID}', [EmployeesController::class, 'assign'])
    ->name('employees.assign');