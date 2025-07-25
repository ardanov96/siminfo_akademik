<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class UserMahasiswaController extends Controller
{
    public function index()
    {
        return Inertia::render('mahasiswa/Index');
    }
}
