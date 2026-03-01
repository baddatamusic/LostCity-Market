<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController
{
    public function create()
    {
        if (Auth::check()) {
            return back()->success('You are already logged in');
        }

        return inertia('register/index/page');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user, true);

        $request->session()->regenerate();

        return to_route('listings.index')->success('Account created successfully');
    }
}
