<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

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
    }
}
