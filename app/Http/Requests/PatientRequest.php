<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'parents_name' => 'nullable|string|max:100',
            'house_phone' => 'nullable|string|max:15',
            'office_phone' => 'nullable|string|max:15',
            'mobile_phone' => 'nullable|string|max:15',
            'emergency_number' => 'nullable|string|max:15',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|max:150|unique:patients,email',
            'address' => 'nullable|string',
            'the_referring' => 'nullable|string|max:100',
            'gender' => 'nullable|in:L,P', // Validasi gender ditambahkan di sini
        ]; 
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'parents_name.string' => 'Nama orang tua harus berupa teks.',
            'parents_name.max' => 'Nama orang tua tidak boleh lebih dari 100 karakter.',
            'house_phone.string' => 'Telepon rumah harus berupa teks.',
            'house_phone.max' => 'Telepon rumah tidak boleh lebih dari 15 karakter.',
            'office_phone.string' => 'Telepon kantor harus berupa teks.',
            'office_phone.max' => 'Telepon kantor tidak boleh lebih dari 15 karakter.',
            // 'mobile_phone.required' => 'Telepon seluler wajib diisi.',
            'mobile_phone.string' => 'Telepon seluler harus berupa teks.',
            'mobile_phone.max' => 'Telepon seluler tidak boleh lebih dari 15 karakter.',
            // 'emergency_number.required' => 'Nomor darurat wajib diisi.',
            'emergency_number.string' => 'Nomor darurat harus berupa teks.',
            'emergency_number.max' => 'Nomor darurat tidak boleh lebih dari 15 karakter.',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            // 'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 150 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            // 'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'the_referring.string' => 'Rujukan harus berupa teks.',
            // 'the_referring.max' => 'Rujukan tidak boleh lebih dari 100 karakter.',
            // 'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin harus salah satu dari L atau P.',
        ];
    }
}
