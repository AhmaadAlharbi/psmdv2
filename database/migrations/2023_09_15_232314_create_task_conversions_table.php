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
        Schema::create('task_conversions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_tasks_id')->nullable();
            $table->unsignedBigInteger('source_department')->nullable();
            $table->unsignedBigInteger('destination_department')->nullable();
            $table->String('status')->nullable();
            $table->foreign('main_tasks_id')
                ->references('id')
                ->on('main_tasks')
                ->onDelete('cascade');
            $table->foreign('source_department')
                ->references('id')
                ->on('departments');
            $table->foreign('destination_department')
                ->references('id')
                ->on('departments');
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
        Schema::dropIfExists('task_conversions');
    }
};
