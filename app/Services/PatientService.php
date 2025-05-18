<?php

namespace App\Services;

use App\Mail\ChangeEmail;
use App\Mail\FirstEmail;
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

            $password = 'Caninus'.date('dmY', strtotime($params->date_of_birth));
            $status = $params->email ? false : true;

            $user = User::create([
                'name' => $params->name,
                'email' => isset($params->email) ? $params->email : "",
                'password' => Hash::make($password),
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
       
            $user->assignRole('user');

            $patient = Patient::create([
                'name' => $params->name,
                'user_id' => $user->id,
                'parents_name' => $params->parents_name,
                'gender' => $params->gender,
                'house_phone' => $params->house_phone,
                'office_phone' => $params->office_phone,
                'mobile_phone' => $params->mobile_phone,
                'emergency_number' => $params->emergency_number,
                'date_of_birth' => $params->date_of_birth,
                'place_of_birth' => $params->place_of_birth,
                'user_identity' => $params->user_identity,
                'email' => $user->email,
                'address' => $params->address,
                'the_referring' => $params->the_referring,
            ]);

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

            $user = User::where('id', $id->user_id)->first();

            $firstEmail = $user->email;

            $user->update([
                'name' => $params->name,
                'email' => $params->email,
            ]);

            $patient = $id->update([
                'name' => $user->name,
                'parents_name' => $params->parents_name,
                'gender' => $params->gender,
                'house_phone' => $params->house_phone,
                'office_phone' => $params->office_phone,
                'mobile_phone' => $params->mobile_phone,
                'emergency_number' => $params->emergency_number,
                'date_of_birth' => $params->date_of_birth,
                'place_of_birth' => $params->place_of_birth,
                'user_identity' => $params->user_identity,
                'email' => $user->email,
                'address' => $params->address,
                'the_referring' => $params->the_referring,
            ]);

            if(isset($params->email)) {
                // Waktu kedaluwarsa 60 menit dari sekarang
                $expires = now()->addMinutes(60)->timestamp;  // Timestamp 60 menit ke depan

                // Membuat URL verifikasi manual dengan parameter expires
                $verificationUrl = route('manual.verification', [
                    'id' => $user->id,
                    'hash' => sha1($user->email),
                    'expires' => $expires,  // Menambahkan parameter expires
                ]);

                if(isset($firstEmail)){
                        if($firstEmail != $user->email){
                            $user->update([
                                'status' => false,
                            ]);
                            $user->status = false;
                            Mail::to($user->email)->send(new ChangeEmail($user, $verificationUrl));
                        }
                }else{
                         $user->update([
                                'status' => false,
                         ]);
                        Mail::to($user->email)->send(new FirstEmail ($user, $verificationUrl));
                }   
             
            }

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
            
            $user = User::where('id', $id->user_id)->first();

            DB::beginTransaction();

            $user->delete();

            DB::commit();
            return;
        
        } catch (\Exception $e) {
            return $patient = [
                'error' => $e->getMessage(),
            ];
        }
    }
}
