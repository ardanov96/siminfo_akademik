<?php

namespace App\Http\Controllers\Auth\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\UserMahasiswa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/RegisterMahasiswa'); 
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       $request->validate([
            'nim' => 'required|numeric|unique:user_mahasiswas',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_mahasiswas',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])], // Menggunakan Rule::in
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:20',
            'angkatan' => 'required|integer|min:1900|max:' . date('Y'), // Sesuaikan range tahun
            'program_studi' => 'required|string|max:255',
        ]);

        $user = UserMahasiswa::create([ // Gunakan model UserMahasiswa
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'angkatan' => $request->angkatan,
            'program_studi' => $request->program_studi,
        ]);

        event(new Registered($user));

        Auth::guard('mahasiswa')->login($user);

        return redirect(route('mahasiswa.dashboard'));
    }
}
