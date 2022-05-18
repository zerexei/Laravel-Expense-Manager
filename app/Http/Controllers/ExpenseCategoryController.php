<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $this->authorize('viewAny', ExpenseCategory::class);

        return view('categories.index', [
            'categories' => ExpenseCategory::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', ExpenseCategory::class);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:expense_categories'],
            'description' => ['required']
        ]);

        ExpenseCategory::create($data);

        return redirect()->back()->with('success', 'Category successfuly created.');
    }

    public function edit(ExpenseCategory $category)
    {
        $this->authorize('update', $category);

        return view('categories.edit', [
            'role' => $category
        ]);
    }


    public function update(Request $request, ExpenseCategory $category)
    {
        $this->authorize('update', $category);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:roles'],
            'description' => ['required']
        ]);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category successfuly updated.');
    }

    public function destroy(ExpenseCategory $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category successfuly deleted.');
    }
}
