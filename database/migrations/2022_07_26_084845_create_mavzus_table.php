<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMavzusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mavzus', function (Blueprint $table) {
            $table->id();
            $table->integer('tema_id');
            $table->string('name');
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->integer('ball')->nullable();
            $table->integer('time_count')->default(0);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('mavzus');
    }
}
