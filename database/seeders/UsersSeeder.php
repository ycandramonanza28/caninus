<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Buat Role
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'user']);
 
         // Buat User Admin
         $admin = User::create([
            'name' => 'admin',
            'email' => 'cs@caninus.id',
            'password' => Hash::make('Caninus@123'),
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
         ]);
         $admin->assignRole('admin');
 
         // Buat User Biasa
        //  $user = User::create([
        //         'name' => 'Yegi Candra Monanza',
        //         'email' => 'yegi@gmail.com',
        //         'password' => Hash::make('password'),
        //         'status' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //  ]);
        //  $user->assignRole('user');
    }
}
