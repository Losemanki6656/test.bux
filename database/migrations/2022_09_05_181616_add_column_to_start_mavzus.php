<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStartMavzus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('start_mavzus', function (Blueprint $table) {
            $table->boolean('status_ret')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('start_mavzus', function (Blueprint $table) {
            $table->dropColumn("status_ret");
        });
    }
}
