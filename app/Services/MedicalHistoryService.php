<?php

namespace App\Services;

use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class MedicalHistoryService
{
    public function store($params)
    {
   
        try {
            DB::beginTransaction();
            
            $medicalHistory = MedicalHistory::create([
                'patient_id' => $params->patient_id,
                'private_doctor' => isset($params->private_doctor) ? $params->private_doctor : NULL,
                'serious_illness' => isset($params->serious_illness) ?  $params->serious_illness : NULL,
                'under_doctor_care' => isset($params->under_doctor_care) ? $params->under_doctor_care : NULL,
                'in_drug_consumption' => isset( $params->in_drug_consumption) ? $params->in_drug_consumption : NULL,
                'blood_transfusion' => isset( $params->blood_transfusion) ?  $params->blood_transfusion : NULL,
                'smoker' => isset($params->smoker) ? $params->smoker : NULL,
                'heart_defects' => isset($params->heart_defects) ? $params->heart_defects : false,
                'blood_pressure' => isset($params->blood_pressure) ?    $params->blood_pressure : false,
                'diabetes' => isset($params->diabetes) ? $params->diabetes : false,
                'hepatitis_jaundice_liver' => isset($params->hepatitis_jaundice_liver) ? $params->hepatitis_jaundice_liver : false,
                'ashma' => isset($params->ashma) ? $params->ashma : false,
                'therapy_cancer' => isset($params->therapy_cancer) ? $params->therapy_cancer : false,
                'blood_disorders' => isset($params->blood_disorders)  ? $params->blood_disorders : false,
                'hiv_aids' => isset($params->hiv_aids) ? $params->hiv_aids : false,
                'digestive_tract' => isset($params->digestive_tract) ? $params->digestive_tract : false,
                'epilepsy' => isset($params->epilepsy) ? $params->epilepsy : false,
                'pregnant' => isset( $params->pregnant) ? $params->pregnant : false,
                'drink_blood_thinners' => isset($params->drink_blood_thinners) ? $params->drink_blood_thinners : false,
                'taking_medicine_osteoporosis' => isset($params->taking_medicine_osteoporosis) ? $params->taking_medicine_osteoporosis : false,
                'allergy' => isset($params->allergy) ? $params->allergy : false,
                'other' => isset($params->other) ? $params->other : NULL,
            ]);

            DB::commit();
            return $medicalHistory;
        
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return $medicalHistory = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function update($params, $medicalHistory)
    {
        try {
            DB::beginTransaction();
       
            $medicalHistory = $medicalHistory->update([
                'patient_id' => $params->patient_id,
                'private_doctor' => isset($params->private_doctor) ? $params->private_doctor : $medicalHistory->private_doctor,
                'serious_illness' => isset($params->serious_illness) ?  $params->serious_illness : $medicalHistory->serious_illness,
                'under_doctor_care' => isset($params->under_doctor_care) ? $params->under_doctor_care : $medicalHistory->under_doctor_care,
                'in_drug_consumption' => isset( $params->in_drug_consumption) ? $params->in_drug_consumption : $medicalHistory->in_drug_consumption,
                'blood_transfusion' => isset( $params->blood_transfusion) ?  $params->blood_transfusion : $medicalHistory->blood_transfusion,
                'smoker' => isset($params->smoker) ? $params->smoker : $medicalHistory->blood_transfusion,
                'heart_defects' => !isset($params->heart_defects) ? false : true,
                'blood_pressure' => !isset($params->blood_pressure) ?    false : true,
                'diabetes' => !isset($params->diabetes) ? false : true,
                'hepatitis_jaundice_liver' => !isset($params->hepatitis_jaundice_liver) ? false : true,
                'ashma' => !isset($params->ashma) ? false : true,
                'therapy_cancer' => !isset($params->therapy_cancer) ? false : true,
                'blood_disorders' => !isset($params->blood_disorders)  ? false : true,
                'hiv_aids' => !isset($params->hiv_aids) ? false : true,
                'digestive_tract' => !isset($params->digestive_tract) ? false : true,
                'epilepsy' => !isset($params->epilepsy) ? false : true,
                'pregnant' => !isset( $params->pregnant) ? false : true,
                'drink_blood_thinners' =>  !isset($params->drink_blood_thinners) ? false : true,
                'taking_medicine_osteoporosis' =>  !isset($params->taking_medicine_osteoporosis) ? false : true,
                'allergy' => !isset($params->allergy) ? false : true,
                'other' => $params->other,
            ]);

            DB::commit();
            return $medicalHistory;
        
        } catch (\Exception $e) {
            return $medicalHistory = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function destroy($params)
    {
        try {
            
            DB::beginTransaction();
            
            $medicalHistory = $params->delete();

            DB::commit();
            return $medicalHistory;
        
        } catch (\Exception $e) {
            return $medicalHistory = [
                'error' => $e->getMessage(),
            ];
        }
    }
}
