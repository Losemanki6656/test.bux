<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('lang_id');
            $table->text('quests')->nullable();
            $table->text('results')->nullable();
            $table->text('resultfail')->nullable();
            $table->integer('result')->nullable();
            $table->integer('count')->nullable();
            $table->integer('time1')->nullable();
            $table->integer('time2')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('status_test')->default(false);
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
        Schema::dropIfExists('result_tests');
    }
}
