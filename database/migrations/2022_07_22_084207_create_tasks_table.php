<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id')->default(1);
            $table->integer('tema_id');
            $table->integer('mavzu_id');
            $table->text('result')->nullable();
            $table->text('ques')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('status_task')->default(false);
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->string('file4')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
