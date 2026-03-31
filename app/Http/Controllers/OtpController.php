<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    // OTP Form dikhane ke liye
    public function show()
    {
        return view('auth.verify-otp');
    }

    // OTP Verify karne ke liye
    public function verify(Request $request)
    {
        $request->validate([
            'otp_code' => ['required', 'numeric']
        ]);

        $user = Auth::user();

        // Check karo DB mein OTP match kar raha hai aur expire toh nahi hua
        if ($user->otp_code == $request->otp_code && now()->lessThanOrEqualTo($user->otp_expires_at)) {
            
            // OTP theek hai, DB se code clear kar do taake reuse na ho
            $user->update([
                'otp_code' => null,
                'otp_expires_at' => null
            ]);

            // Session mein bta do ke OTP pass ho gaya hai
            session(['otp_verified' => true]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp_code' => 'Invalid or expired OTP.']);
    }
}