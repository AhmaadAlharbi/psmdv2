<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            DepartmentSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            MainAlarmSeeder::class,
            AreaSeeder::class,
            ShiftSeeder::class,
            // StationSeeder::class,
            // EquipSeeder::class,
        ]);
    }
}
