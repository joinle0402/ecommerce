<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function onLogin(LoginRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated())) {
            return back()->with('error', 'Email hoặc mật khẩu không hợp lệ!');
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
