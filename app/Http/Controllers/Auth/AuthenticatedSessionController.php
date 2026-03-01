<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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

        // Générer un token API pour Cortex Web
        $user = Auth::user();

        // Créer un identifiant unique pour cet appareil (basé sur user-agent + IP)
        $deviceId = substr(md5($request->userAgent() . $request->ip()), 0, 8);
        $tokenName = 'cortex-web-' . $deviceId;

        // Supprimer uniquement le token de CET appareil (pas les autres)
        $user->tokens()->where('name', $tokenName)->delete();

        // Créer un nouveau token pour cet appareil
        $token = $user->createToken($tokenName)->plainTextToken;

        // Stocker le token en session
        session(['api_token' => $token]);

        // Rediriger vers /chat sur mobile/PWA, /dashboard sur desktop
        $isMobile = (bool) preg_match(
            '/Mobile|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i',
            $request->userAgent() ?? ''
        );

        $destination = $isMobile ? route('cortex.chat') : RouteServiceProvider::HOME;

        return redirect()->intended($destination);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // Supprimer les tokens Cortex Web
        if ($user) {
            $user->tokens()->where('name', 'cortex-web')->delete();
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
