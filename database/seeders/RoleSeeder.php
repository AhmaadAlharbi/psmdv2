<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Roles')->insert([
            'title' => 'Owner'
        ]);
        DB::table('Roles')->insert([
            'title' => 'Admin'
        ]);
        DB::table('Roles')->insert([
            'title' => 'Team Leader'
        ]);
        DB::table('Roles')->insert([
            'title' => 'User'
        ]);
        DB::table('Roles')->insert([
            'title' => 'Engineer'
        ]);
    }
}
