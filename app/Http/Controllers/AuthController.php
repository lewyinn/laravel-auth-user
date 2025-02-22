<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('info', 'Sudah Login');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Register Berhasil, Silahkan login');

        return redirect('/login');
    }

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('info', 'Sudah Login');
        }
        return view('auth.login');
    }

    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Login Berhasil! Selamat Datang, ' . Auth::user()->name);
            return redirect('/dashboard');
        }

        session()->flash('error', 'Email Atau Password Salah');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); // HAPUS SESSION
        $request->session()->regenerateToken(); // REGENERASI TOKEN CSRF

        session()->flash('success', 'Logout berhasil!');

        return redirect('/login');
    }
}
