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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('gender', ['L', 'P'])->comment('Jenis Kelamin: L untuk Laki-laki, P untuk Perempuan');
            $table->string('parents_name', 100)->nullable();
            $table->string('house_phone', 15)->nullable();
            $table->string('office_phone', 15)->nullable();
            $table->string('mobile_phone', 15)->nullable();
            $table->string('emergency_number', 15)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth', 100)->nullable();
            $table->string('email', 150)->unique()->nullable();
            $table->string('user_identity', 150)->nullable();
            $table->text('address')->nullable();
            $table->string('the_referring', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
