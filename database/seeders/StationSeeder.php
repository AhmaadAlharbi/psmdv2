<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->insert([
            'SSNAME' => Str::random(5),
            'COMPANY_MAKE' => Str::random(20),
            'Voltage_Level_KV' => Str::random(20),
            'Contract_No' => Str::random(20),
            'COMMISIONING_DATE' => Str::random(20),
            'COMMISIONING_DATE' => Str::random(20),
            'control' => Str::random(20),
        ]);
    }
}
