<?php

// app/Http/Middleware/EnsureOtpIsVerified.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpIsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Agar user logged in hai, aur wo Admin ya Teacher hai
        if ($user && $user->hasRole(['Admin', 'Teacher'])) {
            
            // Check karo kya isne is session me OTP verify kiya hai?
            if (!session('otp_verified')) {
                // Agar nahi kiya toh wapas OTP page par bhej do!
                return redirect()->route('otp.verify');
            }
        }

        return $next($request);
    }
}