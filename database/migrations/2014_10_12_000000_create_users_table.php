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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('datadiripersonnel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->string('foto_diri')->nullable(); // File Upload
            $table->integer('tahun');
            $table->string('jenis_pelatihan');
            $table->string('file_pelatihan')->nullable(); // File Upload
            $table->string('nama_pelatihan');
            $table->text('catatan')->nullable();
            $table->string('kesimpulan');
            $table->string('tingkat_kebugaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
