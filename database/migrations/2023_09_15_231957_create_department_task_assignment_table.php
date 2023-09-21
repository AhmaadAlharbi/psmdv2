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
        Schema::create('department_task_assignment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('main_tasks_id')->nullable();
            $table->unsignedBigInteger('eng_id')->nullable();
            $table->enum('isCompleted', ['0', '1'])->default('0');
            $table->string('status')->nullable();
            $table->foreign('main_tasks_id')
                ->references('id')
                ->on('main_tasks')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments');
            $table->foreign('eng_id')
                ->references('user_id')
                ->on('engineers');
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
        Schema::dropIfExists('department_task_assignment');
    }
};
