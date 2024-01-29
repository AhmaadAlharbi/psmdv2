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
            $table->date('due_date')->nullable();
            $table->time('due_time')->nullable();
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
            $table->dropColumn('due_date');
            $table->dropColumn('due_time');
        });
    }
};