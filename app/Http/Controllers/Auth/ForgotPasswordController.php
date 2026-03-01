<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController
{
    public function create()
    {
        if (Auth::check()) {
            return back()->success('You are already logged in');
        }

        return inertia('forgot-password/index/page');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->success(__($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
