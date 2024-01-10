<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department_task_assignment', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->default(1);
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_task_assignment', function (Blueprint $table) {
            // Drop the 'area_id' column
            $table->dropColumn('area_id');
        });
    }
};
