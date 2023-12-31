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
        $sql = file_get_contents('stations.sql');

        $sqlChunks = array_chunk(explode("\n", $sql), 1000);

        foreach ($sqlChunks as $sqlChunk) {
            DB::unprepared(implode("\n", $sqlChunk));
        }
    }
}
