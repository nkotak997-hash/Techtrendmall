<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Import Mail facade
use App\Models\User; // Import the correct User model


class OTPController extends Controller
{
    public function otp()
    {
         return view('emails.otp');
    }

    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    // Send OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'This email is not registered.']);
        }

        // Generate OTP and store it in a session (or DB)
        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'email' => $request->email]);

        // Send OTP via email
        // Mail::send('otp', ['otp' => $otp], function ($message) use ($request) {
        //     $message->to($request->email)->subject('Password Reset OTP');
        // });

        Mail::send('otp', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email)->subject('Password Reset OTP');
            $message->from('techtrendmall111@gmail.com', 'TechTrendMall'); // Replace with your email and name
        });


        return redirect()->route('verify.otp.form');
    }

    // Show OTP verification form
    public function showOtpVerificationForm()
    {
        return view('verify-otp');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        return redirect()->route('reset.password.form');
    }

    // Show reset password form
    public function showResetPasswordForm()
    {
        return view('reset-password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        // Find user and update the password
        $user = User::where('email', session('email'))->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // Clear the session data
        session()->forget(['otp', 'email']);

        return redirect()->route('login')->with('success', 'Password updated successfully. Please log in.');
    }
}
