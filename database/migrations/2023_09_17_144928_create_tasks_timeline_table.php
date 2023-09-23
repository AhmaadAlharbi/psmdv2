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
        Schema::create('tasks_timeline', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_tasks_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('status');
            $table->String('action');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('main_tasks_id')
                ->references('id')
                ->on('main_tasks')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('tasks_timeline');
    }
};
