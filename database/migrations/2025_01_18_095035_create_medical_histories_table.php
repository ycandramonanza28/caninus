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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('private_doctor', 100)->nullable();
            $table->string('serious_illness', 100)->nullable();
            $table->string('under_doctor_care', 100)->nullable();
            $table->string('in_drug_consumption', 100)->nullable();
            $table->string('blood_transfusion', 100)->nullable();
            $table->string('smoker', 100)->nullable();
            $table->boolean('heart_defects')->default(false);
            $table->boolean('blood_pressure')->default(false);
            $table->boolean('diabetes')->default(false);
            $table->boolean('hepatitis_jaundice_liver')->default(false);
            $table->boolean('ashma')->default(false);
            $table->boolean('therapy_cancer')->default(false);
            $table->boolean('blood_disorders')->default(false);
            $table->boolean('hiv_aids')->default(false);
            $table->boolean('digestive_tract')->default(false);
            $table->boolean('epilepsy')->default(false);
            $table->boolean('pregnant')->default(false);
            $table->boolean('drink_blood_thinners')->default(false);
            $table->boolean('taking_medicine_osteoporosis')->default(false);
            $table->boolean('allergy')->default(false);
            $table->string('other', 100)->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
