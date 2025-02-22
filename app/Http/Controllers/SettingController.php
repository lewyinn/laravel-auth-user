<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //
    public function showProfile() 
    {
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            abort(500, 'User not found or not an instance of User model');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        if (!$request->filled('password')) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        User::where('id', $user->id)->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Profile Berhasil DiUpdated');
    }

}
