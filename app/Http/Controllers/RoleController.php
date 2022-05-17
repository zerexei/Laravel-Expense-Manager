<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return view('roles.index', [
            'roles' => Role::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:roles'],
            'description' => ['required']
        ]);

        Role::create($data);

        return redirect()->back()->with('success', 'Role successfuly created.');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('roles.edit', [
            'role' => $role
        ]);
    }


    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:roles'],
            'description' => ['required']
        ]);

        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Role successfuly updated.');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role successfuly deleted.');
    }
}
