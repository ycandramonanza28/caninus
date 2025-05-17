<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        if (!Auth::user()->status) {
     
            Auth::logout();

            toast('Akun Anda tidak aktif. Silakan hubungi administrator untuk informasi lebih lanjut','error');

            return redirect()->route('login')->withErrors([
                'status' => 'Akun Anda tidak aktif. Silakan hubungi administrator untuk informasi lebih lanjut.',
            ]);
        }

        $request->session()->regenerate();

        // Cek role dengan Spatie
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return redirect()->route('user.home');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user(); // Ambil user yang sedang login
        Auth::guard('web')->logout(); // Logout user
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirect berdasarkan role
        if ($user->hasRole('admin')) {
            return redirect('/login');
        } else {
            return redirect('/membership');
        }
    }
}
