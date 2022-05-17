<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        // $this->authorize('viewAny', Expense::class);

        return view('expenses.index', [
            // 'expenses' => Auth::user()->expenses
            'expenses' => User::find(2)->expenses->take(10)
        ]);
    }

    public function store(Request $request)
    {
        // $this->authorize('create', Expense::class);

        $data = $request->validate([]);

        Expense::create($data);

        return redirect()->back()->with('success', 'Role successfuly created.');
    }

    public function edit(Expense $expense)
    {
        // $this->authorize('update', $role);

        return view('expenses.edit', [
            'expense' => $expense
        ]);
    }


    public function update(Request $request, Expense $expense)
    {
        // $this->authorize('update', $role);

        $data = $request->validate([]);

        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Role successfuly updated.');
    }

    public function destroy(Expense $expense)
    {
        // $this->authorize('delete', $role);

        $expense->delete();

        return redirect()->route('roles.index')->with('success', 'Role successfuly deleted.');
    }
}
