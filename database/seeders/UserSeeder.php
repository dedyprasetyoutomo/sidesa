<?php

namespace Database\Seeders;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Admin SiDesa',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'status' => 'approved',
            'role_id' => '1' // => 'Admin'
        ]);

        User::create([
            'id' => 2,
            'name' => 'Penduduk 1',
            'email' => 'penduduk@gmail.com',
            'password' => 'password',
            'status' => 'approved',
            'role_id' => '2' // => 'User'
        ]);

        Resident::create([
            'user_id' => 2,
            'nik' => '6363636363636363',
            'name' => 'Admin',
            'gender' => 'male',
            'birth_date' => '2025-01-01',
            'birth_place' => 'cirebon',
            'address' => 'cirebon',
            'marital_status' => 'single',
        ]);
    }
}
