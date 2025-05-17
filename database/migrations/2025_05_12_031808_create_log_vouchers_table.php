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
        Schema::create('log_vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('code'); // ubah dari unsignedBigInteger ke string
            $table->timestamps();
        
            // Foreign key ke tabel patients
            $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('cascade');
        
            // (Opsional) Kalau kamu ingin enforce foreign key ke 'vouchers', bisa begini:
            $table->foreign('code')
                  ->references('code')->on('vouchers')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_vouchers');
    }
};
