<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_tasks_id')->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->String('file');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('main_tasks_id')
                ->references('id')
                ->on('main_tasks');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_attachments');
    }
}
