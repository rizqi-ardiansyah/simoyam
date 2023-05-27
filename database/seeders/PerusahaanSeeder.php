<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Perusahaan::truncate();
        DB::table('perusahaan')->insert([
            [
                'idPerusahaan' => 'P0001',
                'nama' => 'Pokphand Sub Gempol',
                'lokasi' => 'Gempol, Pasuruan',
                'email' => 'subgempol@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'idPerusahaan' => 'P0002',
                'nama' => 'Pokphand Sub Krian',
                'lokasi' => 'Krian, Sidoarjo',
                'email' => 'subkrian@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],

        ]);
        
    }
}
