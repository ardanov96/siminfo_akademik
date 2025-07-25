<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use Exception; 

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = MataKuliah::orderBy('created_at', 'desc')->get();
        return Inertia::render('mata_kuliah/Index', 
        [
            'matakuliah' => $matakuliah
        ]);
    }

    public function create()
    {
        return Inertia::render('mata_kuliah/Create');
    }

    public function store(StoreMataKuliahRequest $request)
    {
        $validatedData = $request->validated(); 
        MataKuliah::create($validatedData);

        return redirect()->route('mata-kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function edit(MataKuliah $mata_kuliah)
    {
        return Inertia::render('mata_kuliah/Edit', [
            'matakuliah' => $mata_kuliah,
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                    'href' => '/dashboard',
                ],
                [
                    'title' => 'Mata Kuliah',
                    'href' => '/mata-kuliah',
                ],
                [
                    'title' => 'Edit Mata Kuliah',
                    'href' => route('mata-kuliah.edit', $mata_kuliah->id),
                ],
            ],
        ]);

    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mata_kuliah) 
    {
        // Data sudah divalidasi oleh UpdateMataKuliahRequest
        $validatedData = $request->validated();

        // Lakukan update pada instance model yang sudah di-resolve
        $mata_kuliah->update($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('mata-kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diperbarui!');   
    }

    public function destroy($id) 
    {
        $matakuliah = MataKuliah::find($id);

        // Cek apakah mata kuliah ditemukan
        if (!$matakuliah->exists) {
            abort(404, 'Mata Kuliah tidak ditemukan atau tidak dapat diakses.');
        }

        try {
            $matakuliah->delete();
            return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus mata kuliah: ' . $e->getMessage());
        }
    }
}
