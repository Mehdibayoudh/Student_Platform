<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            return redirect()->route("{$role}.dashboard"); // dynamic redirect
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,company,centre formation,admin', // added 'centre'
        ]);

        $token = Str::random(64);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
            'verification_token' => $token,
        ]);

        // Create associated role record
        switch ($validatedData['role']) {
            case 'student':
                Student::create(['user_id' => $user->id]);
                break;
            case 'company':
                Company::create([
                    'user_id' => $user->id,
                    'company_name' => $validatedData['name'], // or prefill with input if available
                    'company_description' => '',
                ]);
                break;
            case 'centre formation':
                Centre::create(['user_id' => $user->id]);
                break;
            // 'admin' doesn't need an associated model
        }

        Mail::to($user->email)->send(new \App\Mail\VerificationMail($user));

        return redirect()->route('login')->with('success', 'Account created. Check your email for verification.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function verifyEmail($id, $token)
    {
        $user = User::findOrFail($id);

        if ($user->email_verified_at) {
            return redirect('/login')->with('message', 'Email already verified.');
        }

        if ($user->verification_token !== $token) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }

        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        return redirect('/login')->with('success', 'Email verified successfully!');
    }


}
