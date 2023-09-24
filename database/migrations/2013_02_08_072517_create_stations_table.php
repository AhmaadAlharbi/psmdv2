<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('SSNAME');
            $table->string('COMPANY_MAKE')->nullable();
            $table->string('Voltage_Level_KV')->nullable();
            $table->string('Contract_No')->nullable();
            $table->string('COMMISIONING_DATE')->nullable();
            $table->string('control')->nullable();
            $table->string('FULLNAME')->nullable();
            $table->string('pm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
