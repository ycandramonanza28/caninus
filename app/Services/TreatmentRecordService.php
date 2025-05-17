<?php

namespace App\Services;

use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\TreatmentRecord;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class TreatmentRecordService
{
    public function store($params)
    {
        try {
            DB::beginTransaction();

            $treatmentRecord = TreatmentRecord::create([
                'patient_id' => $params->patient_id,
                'tooth' => $params->tooth,
                'diagnosa' => $params->diagnosa,
                'treatment_note' => $params->treatment_note,
                'note' => $params->note
            ]);

            DB::commit();
            return $treatmentRecord;
        
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return $treatmentRecord = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function update($params, $treatmentNote)
    {
        try {
            DB::beginTransaction();
       
            $treatmentRecord = $treatmentNote->update([
                'patient_id' => $params->patient_id,
                'tooth' => $params->tooth,
                'diagnosa' => $params->diagnosa,
                'treatment_note' => $params->treatment_note,
                'note' => $params->note
            ]);

            DB::commit();
            return $treatmentRecord;
        
        } catch (\Exception $e) {
            return $treatmentRecord = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function destroy($params)
    {
        try {
            
            DB::beginTransaction();
            
            $treatmentRecord = $params->delete();

            DB::commit();
            return $treatmentRecord;
        
        } catch (\Exception $e) {
            return $treatmentRecord = [
                'error' => $e->getMessage(),
            ];
        }
    }
}
