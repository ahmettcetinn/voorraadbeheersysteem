<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Gebruiker;

class LoginController extends Controller
{
    // Bestaande methodes...

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email of wachtwoord is onjuist.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // ==================== NIEUW: REGISTRATIE ====================

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'Naam' => 'required|string|max:255',
            'email' => 'required|email|unique:Gebruiker,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Maak nieuwe gebruiker aan (altijd student!)
        Gebruiker::create([
            'Naam' => $request->Naam,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Rol' => 'student',  // Altijd student bij registratie
        ]);

        return redirect('/login')->with('success', 'Account aangemaakt! Log nu in.');
    }

    // Profiel van gebruiker bekijken
    public function profiel($id)
    {
        $gebruiker = Gebruiker::findOrFail($id);

        // Student mag alleen eigen profiel zien
        if (Auth::user()->isStudent() && Auth::user()->GebruikerID != $id) {
            abort(403, 'Je mag alleen je eigen profiel bekijken.');
        }

        $reserveringen = \App\Models\Reservering::with('product')
            ->where('GebruikerID', $id)
            ->orderBy('ReserveringID', 'desc')
            ->get();

        return view('gebruiker.profiel', compact('gebruiker', 'reserveringen'));
    }

}