<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MainTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_tasks')->insert([
            'refNum' => Str::random(10),
            'station_id' => rand(1, 700),
            'date' => '2023-01-01',
            'problem' => Str::random(30),
            'notes' => Str::random(30),
            'status' => 'pending',
            'user_id' => '1',
            'department_id' => '2',
            'main_alarm_id' => '2',
            'problem' => Str::random(30),

        ]);
        DB::table('main_tasks')->insert([
            'refNum' => Str::random(10),
            'station_id' => rand(1, 700),
            'date' => '2023-01-01',
            'problem' => Str::random(30),
            'notes' => Str::random(30),
            'status' => 'pending',
            'user_id' => '1',
            'department_id' => '2',
            'main_alarm_id' => rand(1, 25),
            'problem' => Str::random(30),

        ]);
    }
}
