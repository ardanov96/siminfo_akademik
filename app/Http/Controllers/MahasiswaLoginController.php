<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.mahasiswa-login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required|string',
            'password' => 'required',
        ]);

        // Autentikasi menggunakan guard 'mahasiswa'
        if (Auth::guard('mahasiswa')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard-mahasiswa'); 
        }

        return back()->withErrors([
            'nim' => 'NIM atau password salah.',
        ])->onlyInput('nim');
    }

    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
