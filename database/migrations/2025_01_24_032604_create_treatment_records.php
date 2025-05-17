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
        Schema::create('treatment_records', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('patient_id');
            $table->string('tooth', 50)->nullable();
            $table->string('diagnosa', 255)->nullable();
            $table->text('treatment_note')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        
            // Tambahkan foreign key constraint
            $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_records');
    }
};
