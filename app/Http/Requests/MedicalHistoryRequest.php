<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'private_doctor' => 'nullable|string|max:100',
            'serious_illness' => 'nullable|string|max:100',
            'under_doctor_care' => 'nullable|string|max:100',
            'in_drug_consumption' => 'nullable|string|max:100',
            'blood_transfusion' => 'nullable|string|max:100',
            'smoker' => 'nullable|string|max:100',
            'heart_defects' => 'nullable|boolean',
            'blood_pressure' => 'nullable|boolean',
            'diabetes' => 'nullable|boolean',
            'hepatitis_jaundice_liver' => 'nullable|boolean',
            'ashma' => 'nullable|boolean',
            'therapy_cancer' => 'nullable|boolean',
            'blood_disorders' => 'nullable|boolean',
            'hiv_aids' => 'nullable|boolean',
            'digestive_tract' => 'nullable|boolean',
            'epilepsy' => 'nullable|boolean',
            'pregnant' => 'nullable|boolean',
            'drink_blood_thinners' => 'nullable|boolean',
            'taking_medicine_osteoporosis' => 'nullable|boolean',
            'allergy' => 'nullable|boolean',
        ]; 
    }

    public function messages(): array
    {
        return [
            'private_doctor.string' => 'Nama dokter pribadi harus berupa teks.',
            'private_doctor.max' => 'Nama dokter pribadi tidak boleh lebih dari 100 karakter.',

            'serious_illness.string' => 'Penyakit serius harus berupa teks.',
            'serious_illness.max' => 'Penyakit serius tidak boleh lebih dari 100 karakter.',

            'under_doctor_care.string' => 'Perawatan dokter harus berupa teks.',
            'under_doctor_care.max' => 'Perawatan dokter tidak boleh lebih dari 100 karakter.',

            'in_drug_consumption.string' => 'Penggunaan obat harus berupa teks.',
            'in_drug_consumption.max' => 'Penggunaan obat tidak boleh lebih dari 100 karakter.',

            'blood_transfusion.string' => 'Transfusi darah harus berupa teks.',
            'blood_transfusion.max' => 'Transfusi darah tidak boleh lebih dari 100 karakter.',

            'smoker.string' => 'Status perokok harus berupa teks.',
            'smoker.max' => 'Status perokok tidak boleh lebih dari 100 karakter.',

            'heart_defects.boolean' => 'Kelainan jantung harus berupa nilai benar atau salah.',
            'blood_pressure.boolean' => 'Tekanan darah harus berupa nilai benar atau salah.',
            'diabetes.boolean' => 'Diabetes harus berupa nilai benar atau salah.',
            'hepatitis_jaundice_liver.boolean' => 'Hepatitis, kuning, atau gangguan hati harus berupa nilai benar atau salah.',
            'ashma.boolean' => 'Asma harus berupa nilai benar atau salah.',
            'therapy_cancer.boolean' => 'Terapi kanker harus berupa nilai benar atau salah.',
            'blood_disorders.boolean' => 'Gangguan darah harus berupa nilai benar atau salah.',
            'hiv_aids.boolean' => 'HIV/AIDS harus berupa nilai benar atau salah.',
            'digestive_tract.boolean' => 'Gangguan saluran pencernaan harus berupa nilai benar atau salah.',
            'epilepsy.boolean' => 'Epilepsi harus berupa nilai benar atau salah.',
            'pregnant.boolean' => 'Kehamilan harus berupa nilai benar atau salah.',
            'drink_blood_thinners.boolean' => 'Konsumsi pengencer darah harus berupa nilai benar atau salah.',
            'taking_medicine_osteoporosis.boolean' => 'Penggunaan obat osteoporosis harus berupa nilai benar atau salah.',
            'allergy.boolean' => 'Alergi harus berupa nilai benar atau salah.',
        ];
    }

}
