<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
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
            'expenses' => Auth::user()->expenses,
            'categories' => ExpenseCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'entry_date' => ['required', 'date'],
        ]);
        $data['expense_category_id'] = $data['category'];
        $data['user_id'] = Auth::user()->id;

        Expense::create($data);

        return redirect()->back()->with('success', 'Expense successfuly created.');
    }

    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        return view('expenses.edit', [
            'expense' => $expense,
            'categories' => ExpenseCategory::all()
        ]);
    }


    public function update(Request $request, Expense $expense)
    {
        $this->authorize('update', $expense);

        $data = $request->validate([
            'category' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'entry_date' => ['required', 'date'],
        ]);

        $data['expense_category_id'] = $data['category'];
        $data['user_id'] = Auth::user()->id;

        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Expense successfuly updated.');
    }

    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense successfuly deleted.');
    }
}
