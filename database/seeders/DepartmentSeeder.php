<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'PSMD'
        ]);
        DB::table('departments')->insert([
            'name' => 'Protection Department'
        ]);
        DB::table('departments')->insert([
            'name' => 'Batteries Department'
        ]);
        DB::table('departments')->insert([
            'name' => 'Transformers Department'
        ]);
        DB::table('departments')->insert([
            'name' => 'Switchgears Department'
        ]);
    }
}
