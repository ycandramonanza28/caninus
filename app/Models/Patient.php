<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function treatmentRecord()
    {
        return $this->hasMany(TreatmentRecord::class);
    }
}
