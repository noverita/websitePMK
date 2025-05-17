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
        Schema::create('hasil_kuisioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date');
            $table->string('shift');
            foreach ([
                'keluhan1', 'keluhan2', 'keluhan3', 'keluhan4', 'keluhan5',
                'wat1', 'wat2', 'wat3', 'wat4', 'wat5', 'wat6', 'wat7', 'wat8',
                'ols1', 'ols2', 'ols3', 'ols4'
            ] as $column) {
                $table->string($column)->nullable();
            }
            $table->enum('tingkat_kebugaran', ['Excellent', 'Good', 'Kurang fit'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_record_quisioners');
    }
};
