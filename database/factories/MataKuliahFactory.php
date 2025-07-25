<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MataKuliah::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar nama mata kuliah 
        $courseNames = [
            'Algoritma dan Struktur Data',
            'Basis Data',
            'Pemrograman Web',
            'Jaringan Komputer',
            'Sistem Operasi',
            'Matematika Diskrit',
            'Kecerdasan Buatan',
            'Pengantar Teknologi Informasi',
            'Statistika dan Probabilitas',
            'Manajemen Proyek TI',
            'Pengantar Bisnis Digital', 
            'Etika Profesi TI',
            'Desain Web Interaktif',
            'Keamanan Jaringan',
            'Analisis Big Data',
            'Manajemen Basis Data',
            'Pengembangan Aplikasi Mobile',
            'Interaksi Manusia Komputer',
            'Cloud Computing',
            'Big Data Analytics',
            'Sistem Pendukung Keputusan',
            'Data Mining',
            'Machine Learning',
            'Deep Learning',
            'Komputasi Paralel dan Terdistribusi',
            'Grafika Komputer',
            'Kriptografi',
            'Audit Sistem Informasi',
            'E-Business',
            'Teknik Kompilasi',
            'Pemrograman Berorientasi Objek',
            'Rekayasa Perangkat Lunak',
            'Tes dan Implementasi Sistem',
            'Manajemen Proyek Perangkat Lunak',
            'Sistem Informasi Akuntansi',
            'Data Warehouse',
            'Pengantar Ilmu Komputer',
            'Logika Informatika',
            'Sistem Digital',
            'Struktur Diskrit',
            'Teori Bahasa dan Otomata',
            'Kecerdasan Buatan Lanjut',
            'Robotika',
            'Visi Komputer',
            'Natural Language Processing',
        ];

        // Daftar kode mata kuliah dengan awalan umum
        $courseCodes = [
            'IF', 'SI', 'TI', 'TK', 'EL'
        ];

        // Memastikan kode mata kuliah unik dengan menambahkan angka acak
        $codePrefix = $this->faker->randomElement($courseCodes);

        return [
            'kode_mata_kuliah' => $codePrefix . $this->faker->unique()->randomNumber(4, true),
            'nama_mata_kuliah' => $this->faker->randomElement($courseNames),
            'sks' => $this->faker->numberBetween(2, 4), 
            'semester' => $this->faker->numberBetween(1, 8), 
            'deskripsi' => $this->faker->paragraph(), 
        ];
    }
}
