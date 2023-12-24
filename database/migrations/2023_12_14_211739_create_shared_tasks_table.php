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
        Schema::create('shared_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_task_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->boolean('tracked')->default(1);
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
        Schema::table('shared_tasks', function (Blueprint $table) {
            $table->dropForeign(['main_task_id']);
        });
        Schema::dropIfExists('shared_tasks');
    }
};
