<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VaksinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vaksinasi')->insert([
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '27',
                'tglVaksinasi' => date('Y-m-d H:i:s'),
                'jenis' => 0,
                'jadwal' => date('Y-m-d H:i:s'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '28',
                'tglVaksinasi' => date('Y-m-d H:i:s'),
                'jenis' => 1,
                'jadwal' => date('Y-m-d H:i:s'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'idPerusahaan' => 'P0001',
                'idKandang' => '31',
                'tglVaksinasi' => date('Y-m-d H:i:s'),
                'jenis' => 2,
                'jadwal' => date('Y-m-d H:i:s'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           

        ]);
    }
}
