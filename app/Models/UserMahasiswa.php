<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserMahasiswa extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserMahasiswaFactory> */
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'user_mahasiswas';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'password',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telepon',
        'angkatan',
        'program_studi',
        'foto_profil',
    ];

    protected $guarded = [];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data asli.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Jika Anda menambahkan fitur verifikasi email
        'password' => 'hashed', // Laravel 10+ secara otomatis melakukan hashing di sini
        'tanggal_lahir' => 'date', // Mengubah string tanggal menjadi objek Carbon
    ];

     /**
     * Hash the password automatically when setting it.
     */
    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value);
    }
}
