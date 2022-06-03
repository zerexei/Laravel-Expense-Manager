<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;

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

// TODO: fix: overflow of list

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
        Route::resource('users', UserController::class)->except(['create', 'show']);
        Route::resource('categories', ExpenseCategoryController::class)->except(['create', 'show']);
        Route::resource('expenses', ExpenseController::class)->except(['create', 'show']);
    });

    Route::get('/password/edit', [ChangePasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [ChangePasswordController::class, 'update'])->name('password.update');
});


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::delete('logout', [LogoutController::class, 'destroy'])->name('logout');

Route::get('/oAuth/github', function () {
    return Socialite::driver('github')->redirect();
});


Route::get('/oAuth/github/callback', function () {
    $user = Socialite::driver('github')->user();
    dd($user);
});
