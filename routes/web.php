<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\User;
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
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::delete('logout', [LogoutController::class, 'destroy'])->name('logout');
