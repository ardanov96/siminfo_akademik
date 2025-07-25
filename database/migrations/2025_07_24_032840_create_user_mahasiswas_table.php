<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nim')->unique()->nullable();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->text('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->integer('angkatan');
            $table->string('program_studi');
            $table->string('foto_profil')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_mahasiswas');
    }
};
