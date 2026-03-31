<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckApprovalStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->status !== 'approved'){
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is not approved yet. Please wait for approval.');
            Auth::guard('web')->logout();

              $request->session()->invalidate;
              $request->session()->regenerateToken();
             return redirect('/login')->with('status', 'Your Acccount is on Pending state, Please wait for approval from Admin');
            
              }

        return $next($request);
    }
}
