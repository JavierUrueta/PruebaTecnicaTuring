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
        if (Auth::guard('director')->attempt($request->only('email', 'password'))) {
            //dd('Autenticado como director');
            $request->session()->regenerate();
    
            //return redirect()->intended(route('director.dashboard'));
            return redirect()->route('director.dashboard');
        }
    
        //dd('Falló la autenticación');
        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    } 

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cambiar el guard a 'directors' en lugar de 'web'
        Auth::guard('director')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


