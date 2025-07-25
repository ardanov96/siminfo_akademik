<?php

namespace Database\Factories;

use App\Models\UserMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMahasiswa>
 */
class UserMahasiswaFactory extends Factory
{
    /**
     * Nama model yang terkait dengan factory ini.
     *
     * @var string
     */
    protected $model = UserMahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisKelamin = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $firstName = ($jenisKelamin === 'Laki-laki') ? $this->faker->firstNameMale() : $this->faker->firstNameFemale();
        $lastName = $this->faker->lastName();

        // Beberapa program studi umum
        $programStudi = $this->faker->randomElement([
            'Teknik Informatika',
            'Sistem Informasi',
            'Manajemen Informatika',
            'Rekayasa Perangkat Lunak ',
            'Bisnis Digital',
            'Teknologi Rekayasa Multimedia',
            'Desain Komunikasi Visual',
            'Sistem Komputer',
            'Sains Data',
            'Teknik Komunikasi'
        ]);

        return [
            'nim' => $this->faker->unique()->numerify('##########'),
            'nama' => $firstName . ' ' . $lastName,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), 
            'jenis_kelamin' => $jenisKelamin,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2005-01-01'), 
            'tempat_lahir' => $this->faker->city(),
            'alamat' => $this->faker->address(),
            'no_telepon' => $this->faker->phoneNumber(),
            'angkatan' => $this->faker->numberBetween(2019, 2024), 
            'program_studi' => $programStudi,
            'foto_profil' => null, 
            'remember_token' => null, 
        ];

        UserMahasiswa::factory()->count(20)->create();
    }
}
