<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index()
    {
        if (Auth::check()) {
            return back()->success('You are already logged in');
        }

        return inertia('login/index/page');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.',
            ])->onlyInput('name');
        }

        $request->session()->regenerate();

        return to_route('listings.index')->success('You have successfully logged in');
    }

    public function destroy()
    {
        Auth::logout();

        return back()->success('You have successfully logged out');
    }
}
