<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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

        $request->session()->regenerate();


        if (Auth::user()->hasRole('guru')) {
            return redirect()->intended(RouteServiceProvider::HOME_GURU);
        } else if (Auth::user()->hasRole('siswa')) {
            $user = Auth::user();
            $user->session_login_at = Carbon::now();
            $user->save();

            return redirect()->intended(RouteServiceProvider::HOME_SISWA);
        } else if (Auth::user()->hasRole('admin')) {
            return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
        }

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user->session_login_at) {
            $timeDifference = Carbon::parse($user->session_login_at)->diffInMinutes(Carbon::now());
            $user->total_login_time += $timeDifference;
        }

        $user->session_login_at = null;
        $user->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
