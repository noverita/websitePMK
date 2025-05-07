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
            foreach (['Q1', 'Q2', 'Q3', 'Q4', 'QO1', 'QO2', 'QO3', 'QO4', 'QO5', 'Q5', 'Q6', 'Q7', 'QK1', 'QK2', 'QK3', 'QK4', 'QK5', 'QA1', 'QA2', 'QA3', 'QA4', 'QA5', 'QA6', 'QA7', 'QA8', 'QB1', 'QB2', 'QB3', 'QB4'] as $column) {
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
