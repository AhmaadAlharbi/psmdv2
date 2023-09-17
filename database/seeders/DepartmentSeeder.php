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
            'name' => 'ادارة صيانة محطات التحويل الرئيسية'
        ]);
        DB::table('departments')->insert([
            'name' => 'الوقاية'
        ]);
        DB::table('departments')->insert([
            'name' => 'البطاريات'
        ]);
        DB::table('departments')->insert([
            'name' => 'المحولات'
        ]);
        DB::table('departments')->insert([
            'name' => 'صيانة المعدات'
        ]);
    }
}
