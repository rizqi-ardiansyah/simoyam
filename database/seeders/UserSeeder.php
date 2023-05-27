<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //User::truncate();
        // DB::table('users')->delete();

        $prshn1 = User::create([
            'idPerusahaan' => 'P0001',
            'firstname' => 'Sub',
            'lastname' => 'Gempol',
            'email' => 'subgempol@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $prshn2 = User::create([
            'idPerusahaan' => 'P0002',
            'firstname' => 'Sub',
            'lastname' => 'Krian',
            'email' => 'subkriangmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $prshn1->assignRole('admin');
        $prshn2->assignRole('admin');
        // $admin2->assignRole('admin');

        $pgw1 = User::create([
            'idPerusahaan' => 'P0001',
            'firstname' => 'Pegawai',
            'lastname' => 'Satu',
            'email' => 'pegawai1@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $pgw2 = User::create([
            'idPerusahaan' => 'P0002',
            'firstname' => 'Pegawai',
            'lastname' => 'Dua',
            'email' => 'pegawai2@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
       
        $pgw1->assignRole('pegawai');
        $pgw2->assignRole('pegawai');
    }
}

