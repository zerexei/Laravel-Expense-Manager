<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // $this->authorize('viewAny', User::class);

        return view('users.index', [
            'users' => User::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        // $this->authorize('create', User::class);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:8', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255', 'confirmed']
        ]);

        // move to model set attribute
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        // use $role = where('name', 'users') | $role->id
        $user->roles()->toggle([1]);

        return redirect()->back()->with('success', 'User successfuly created.');
    }

    public function edit(User $user)
    {
        // $this->authorize('update', $user);

        return view('users.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        // $this->authorize('update', $user);

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:roles'],
            'description' => ['required']
        ]);

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User successfuly updated.');
    }

    public function destroy(User $user)
    {
        // $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User successfuly deleted.');
    }
}
