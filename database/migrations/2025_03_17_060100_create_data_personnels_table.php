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
        Schema::create('data_personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik')->nullable()->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto_diri')->nullable();
            $table->string('grade')->nullable();
            $table->string('whatsapp')->nullable();
            $table->enum('status_pegawai', ['Organik', 'Non-Organik'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_personnels');
    }
};
