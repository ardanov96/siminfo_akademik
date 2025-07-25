<?php

namespace Database\Seeders;

use App\Models\MataKuliah; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
     use HasFactory; 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataKuliah::truncate(); 

        MataKuliah::factory()->count(15)->create();

        MataKuliah::factory()->create([
            'kode_mata_kuliah' => 'IF101',
            'nama_mata_kuliah' => 'Pengantar Pemrograman',
            'sks' => 3,
            'semester' => 1,
            'deskripsi' => 'Mempelajari dasar-dasar pemrograman menggunakan bahasa tertentu.',
        ]);

        MataKuliah::factory()->create([
            'kode_mata_kuliah' => 'IF202',
            'nama_mata_kuliah' => 'Struktur Data',
            'sks' => 3,
            'semester' => 2,
            'deskripsi' => 'Mempelajari berbagai struktur data seperti array, linked list, tree, dan graph.',
        ]);

        MataKuliah::factory()->create([
            'kode_mata_kuliah' => 'SI303',
            'nama_mata_kuliah' => 'Sistem Informasi Geografis',
            'sks' => 4,
            'semester' => 5,
            'deskripsi' => 'Mempelajari konsep dan aplikasi sistem informasi geografis.',
        ]);

        // Contoh 3: Membuat lebih banyak mata kuliah acak
        MataKuliah::factory()->count(10)->create();
    }
}
