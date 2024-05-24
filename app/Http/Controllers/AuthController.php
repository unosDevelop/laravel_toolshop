<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{

    public function index(){
        view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        }
        return back()->withError(['email' => 'Invalid email or password']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $verificationCode = Str::random(60);
            EmailVerification::create([
                'user_id' => $user->id,
                'verification_code' => $verificationCode,
                'expires_at' => Carbon::now()->addMinutes(30),
            ]);

            Mail::to($user->email)->send(new VerifyEmail($verificationCode));
            return redirect()->route('showLoginForm')->with('status', 'Verification email sent!');

            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
            }
        }
    }

    public function verifyEmail($verificationCode)
    {
        $verification = EmailVerification::where('verification_code', $verificationCode)->first();

        if (!$verification) {
            return redirect()->route('showLoginForm')->with('error', 'Invalid verification token.');
        }

        $user = User::find($verification->user_id);

        if ($user->email_verified_at) {
            return redirect()->route('showRegisterForm')->with('message', 'Email already verified.');
        }

        $user->email_verified_at = Carbon::now();
        $user->email_verified = 1;
        $user->save();

        return redirect()->route('showLoginForm')->with('message', 'Email successfully verified.');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}