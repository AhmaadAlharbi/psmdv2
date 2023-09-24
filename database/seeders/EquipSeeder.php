<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents('equip.sql');

        $sqlChunks = array_chunk(explode("\n", $sql), 40000);

        foreach ($sqlChunks as $sqlChunk) {
            DB::unprepared(implode("\n", $sqlChunk));
        }

        // Order the data in the equip table by ID from 1 to the latest one.
        DB::update('UPDATE equip ORDER BY id ASC');
    }
}
