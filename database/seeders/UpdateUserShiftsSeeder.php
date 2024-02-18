<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateUserShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->whereIn('id', [14])->update(['Shift' => 'D']);
        DB::table('users')->whereIn('id', [19])->update(['Shift' => 'C']);
        DB::table('users')->whereIn('id', [22])->update(['Shift' => 'C', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [32])->update(['Shift' => 'B']);
        DB::table('users')->whereIn('id', [33])->update(['Shift' => 'D']);
        DB::table('users')->whereIn('id', [38])->update(['Shift' => 'A']);
        DB::table('users')->whereIn('id', [40])->update(['Shift' => 'B', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [42, 43])->update(['Shift' => 'C']);
        DB::table('users')->whereIn('id', [44])->update(['Shift' => 'A', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [45])->update(['Shift' => 'A']);
        DB::table('users')->whereIn('id', [47])->update(['Shift' => 'B']);
        DB::table('users')->whereIn('id', [52])->update(['Shift' => 'D']);
        DB::table('users')->whereIn('id', [53])->update(['Shift' => 'C', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [56])->update(['Shift' => 'A']);
        DB::table('users')->whereIn('id', [58])->update(['Shift' => 'A', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [63])->update(['Shift' => 'A']);
        DB::table('users')->whereIn('id', [65])->update(['Shift' => 'C']);
        DB::table('users')->whereIn('id', [67])->update(['Shift' => 'B']);
        DB::table('users')->whereIn('id', [74])->update(['Shift' => 'D', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [75])->update(['Shift' => 'D']);
        DB::table('users')->whereIn('id', [77])->update(['Shift' => 'B']);
        DB::table('users')->whereIn('id', [78])->update(['Shift' => 'B', 'role_id' => '6']);
        DB::table('users')->whereIn('id', [82])->update(['Shift' => 'D', 'role_id' => '6']);
    }
}
