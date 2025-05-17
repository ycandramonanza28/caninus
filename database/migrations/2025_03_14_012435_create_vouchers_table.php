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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode unik voucher
            $table->string('name'); // Nama voucher
            $table->text('description')->nullable(); // Deskripsi voucher
            $table->date('start_date'); // Tanggal mulai
            $table->time('start_time'); // Waktu mulai
            $table->date('end_date'); // Tanggal berakhir
            $table->time('end_time'); // Waktu akhir
            $table->string('image')->nullable(); // Path gambar voucher
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
