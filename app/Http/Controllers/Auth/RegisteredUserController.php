<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'kelas' => ['required'],
            'no_absen' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'no_absen' => $request->no_absen,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('siswa');

        event(new Registered($user));

        Auth::login($user);

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

        // return redirect(RouteServiceProvider::HOME);
    }
}
