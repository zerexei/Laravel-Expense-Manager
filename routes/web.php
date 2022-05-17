<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    $expense_category_total = [];

    foreach ($user->expenses as $expense) {
        $category_name = $expense->categories->name;

        if (array_key_exists($category_name, $expense_category_total)) {
            $expense_category_total[$category_name] += $expense->amount;
            continue;
        }

        $expense_category_total[$category_name] = $expense->amount;
    }


    return view('dashboard', [
        'user' => $user,
        'expense_category_total' => $expense_category_total
    ]);
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class)->except(['create', 'show']);
    Route::resource('users', UserController::class)->except(['create', 'show']);
    Route::resource('categories', ExpenseCategoryController::class)->except(['create', 'show']);
    Route::resource('expenses', ExpenseController::class)->except(['create', 'show']);
});


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::delete('logout', [LogoutController::class, 'destroy'])->name('logout');
