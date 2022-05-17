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
        return view('roles.index', [
            'roles' => Role::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:roles'],
            'description' => ['required']
        ]);

        Role::create($data);

        return redirect()->back()->with('success', 'Role successfuly created.');
    }
}
