<?php

namespace App\Services;

use App\Mail\VerifyEmail;
use App\Models\Patient;
use App\Models\User;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class PatientService
{
    public function store($params)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::create([
                'name' => $params->name,
                'parents_name' => $params->parents_name,
                'gender' => $params->gender,
                'house_phone' => $params->house_phone,
                'office_phone' => $params->office_phone,
                'mobile_phone' => $params->mobile_phone,
                'emergency_number' => $params->emergency_number,
                'date_of_birth' => $params->date_of_birth,
                'place_of_birth' => $params->place_of_birth,
                'user_identity' => $params->user_identity,
                'email' => $params->email,
                'address' => $params->address,
                'the_referring' => $params->the_referring,
            ]);

            $password = 'Caninus'.date('dmY', strtotime($params->date_of_birth));

            $user = User::create([
                'name' => $params->name,
                'email' => isset($params->email) ? $params->email : "",
                'password' => Hash::make($password),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $user->assignRole('user');

            if(isset($params->email)) {
                // Waktu kedaluwarsa 60 menit dari sekarang
                $expires = now()->addMinutes(60)->timestamp;  // Timestamp 60 menit ke depan

                // Membuat URL verifikasi manual dengan parameter expires
                $verificationUrl = route('manual.verification', [
                    'id' => $user->id,
                    'hash' => sha1($user->email),
                    'expires' => $expires,  // Menambahkan parameter expires
                    'password' => $password
                ]);

                // Kirim email
                Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));
            }
            
            DB::commit();

            
            return $patient;
        
        } catch (\Exception $e) {
            return $patient = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function update($params, $id)
    {
        try {
            DB::beginTransaction();
            
            $patient = $id->update([
                'name' => $params->name,
                'parents_name' => $params->parents_name,
                'gender' => $params->gender,
                'house_phone' => $params->house_phone,
                'office_phone' => $params->office_phone,
                'mobile_phone' => $params->mobile_phone,
                'emergency_number' => $params->emergency_number,
                'date_of_birth' => $params->date_of_birth,
                'place_of_birth' => $params->place_of_birth,
                'email' => $params->email,
                'address' => $params->address,
                'the_referring' => $params->the_referring,
            ]);

            DB::commit();
            return $patient;
        
        } catch (\Exception $e) {
            return $patient = [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function destroy($id)
    {
        try {
            
            DB::beginTransaction();
            
            $id->delete();

            DB::commit();
            return;
        
        } catch (\Exception $e) {
            return $patient = [
                'error' => $e->getMessage(),
            ];
        }
    }
}
