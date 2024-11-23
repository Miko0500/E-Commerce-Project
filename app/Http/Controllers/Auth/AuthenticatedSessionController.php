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
    // Attempt to authenticate the user by checking if the email exists
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user) {
        // If the user exists, check if the password is correct
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerate the session after successful authentication
            $request->session()->regenerate();

            // Redirect based on the user type
            if ($request->user()->usertype === 'admin') {
                return redirect('admin/dashboard');
            }

            return redirect()->intended(route('dashboard'));
        } else {
            // If the password is incorrect
            return back()->withErrors([
                'password' => 'Password is incorrect.',
            ])->onlyInput('email'); // Retain the email input on failure
        }
    } else {
        // If the email does not exist in the database
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); // Retain the email input on failure
    }
}

    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
