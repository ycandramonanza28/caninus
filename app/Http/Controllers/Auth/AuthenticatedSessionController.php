<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

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
    try {
        $request->authenticate();
    } catch (ValidationException $e) {
        $login = $request->input('login');

        // Cari user berdasarkan email atau ID
        $user = \App\Models\User::where('email', $login)
            ->orWhere('id', $login)
            ->first();

        // Redirect sesuai role user
        if ($user && $user->hasRole('admin')) {
            Alert::toast('Email/ID atau kata sandi admin salah', 'error');
            return redirect()->route('login')->withErrors([
                'login' => 'Email/ID atau kata sandi salah',
            ]);
        } else {
            Alert::toast('Email/ID atau kata sandi salah', 'error');
            return redirect()->route('membership')->withErrors([
                'login' => 'Email/ID atau kata sandi salah',
            ]);
        }
    }

    // Cek status aktif user
    if (!Auth::user()->status) {
        if (Auth::user()->hasRole('admin')) {
            Auth::logout();
            Alert::toast('Akun Anda tidak aktif. Silakan hubungi administrator.', 'error');
            return redirect()->route('login')->withErrors([
                'status' => 'Akun Anda tidak aktif.',
            ]);
        } elseif (Auth::user()->hasRole('user')) {
            Auth::logout();
            Alert::toast('Akun belum aktif. Verifikasi email Anda untuk melanjutkan.', 'error');
            return redirect()->route('membership')->withErrors([
                'status' => 'Akun Anda tidak aktif.',
            ]);
        }
    }

    // Regenerasi session setelah login
    $request->session()->regenerate();

    // Redirect sesuai role
    if (Auth::user()->hasRole('admin')) {
        return redirect()->route('dashboard');
    } elseif (Auth::user()->hasRole('user')) {
        return redirect()->route('user.home');
    }

    // Fallback redirect
    return redirect()->route('login');
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
