<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periksa')->insert([
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '27',
                'tglPeriksa' => date('Y-m-d H:i:s'),
                'mati' => 7,
                'culling' => 10,
                'bobot' => 3,
                'pakan' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '28',
                'tglPeriksa' => date('Y-m-d H:i:s'),
                'mati' => 2,
                'culling' => 6,
                'bobot' => 3,
                'pakan' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '31',
                'tglPeriksa' => date('Y-m-d H:i:s'),
                'mati' => 2,
                'culling' => 3,
                'bobot' => 3,
                'pakan' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           

        ]);
    }
}
