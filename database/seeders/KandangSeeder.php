<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kandang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //   Kandang::truncate();
          DB::table('kandang')->insert([
              [
                  'idPerusahaan' => 'P0001',
                  'noKandang' => 2,
                  'tglMasuk' => date('Y-m-d H:i:s'),
                  'asalPeternak' => 'Batu',
                  'jnsAyam' => 0,
                  'jmlAyam' => 100,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
              ],
              [
                    'idPerusahaan' => 'P0001',
                    'noKandang' => 3,
                    'tglMasuk' => date('Y-m-d H:i:s'),
                    'asalPeternak' => 'Probolinggo',
                    'jnsAyam' => 0,
                    'jmlAyam' => 100,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
              ],
             
  
          ]);
    }
}
