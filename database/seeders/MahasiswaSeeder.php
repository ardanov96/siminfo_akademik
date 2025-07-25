<?php

namespace Database\Seeders;

use App\Models\UserMahasiswa; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserMahasiswa::truncate();

        UserMahasiswa::factory()->count(50)->create();

        UserMahasiswa::factory()->create([
            'nim' => '2023000001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@student.com',
            'password' => Hash::make('password123'),
            'angkatan' => 2023,
            'program_studi' => 'Teknik Informatika',
        ]);

        UserMahasiswa::factory()->create([
            'nim' => '2022000005',
            'nama' => 'Siti Aminah',
            'email' => 'siti@student.com',
            'password' => Hash::make('password123'),
            'angkatan' => 2022,
            'program_studi' => 'Sistem Informasi',
            'jenis_kelamin' => 'Perempuan'
        ]);

        UserMahasiswa::factory()->count(20)->create();
    }
}
