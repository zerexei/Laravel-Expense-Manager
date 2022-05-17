<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //

    public function edit()
    {
        return view('auth.ChangePassword');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'min:8', 'max:255', 'confirmed']
        ]);

        if (!Hash::check($data['old_password'], Auth::user()->password)) {
            return redirect()->back()->with(
                'old_password',
                'User password and old password did not match.',
            );
        }
        $password = Hash::make($data['password']);
        Auth::user()->update(['password' => $password]);
        return redirect()->route('dashboard')->with('success', 'Password changed successfully');
    }
}
