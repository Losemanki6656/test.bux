<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('mavzu_id');
            $table->integer('task_id');
            $table->boolean('status')->nullable();
            $table->integer('ball')->default(0);
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
        Schema::dropIfExists('result_tasks');
    }
}
