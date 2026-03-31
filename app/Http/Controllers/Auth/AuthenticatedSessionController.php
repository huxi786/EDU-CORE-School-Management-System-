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
    public function create(): View
    {
        return view('auth.login');
    }

   public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Agar user Admin ya Teacher hai, toh pehle OTP par bhejo
        if ($user->hasRole(['Admin', 'Teacher'])) {
            $user->generateOtp();
            return redirect()->route('otp.verify');
        }

        // YAHAN FIX KIYA HAI: Dashboard ki jagah 'home' route par bhej diya
        return redirect()->intended(route('home', absolute: false));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // YAHAN FIX KIYA HAI: Redirect ke sath cache clear headers
        return redirect('/')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT',
        ]);
    }
}