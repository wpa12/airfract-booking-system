<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

/**
 * This is a controller to handle login functionality
 */
class LoginController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        // normalises the email by converting it to lowercase and removing any whitespace
        $normalisedEmail = strtolower(trim($request->input('email')));

        // attempts to login the user and redirects them to the dashboard if successful
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.index'));
        }
        
        // if the login fails redirect them back to the login page with errors
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
}
