<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
           $table->id();
            $table->integer('tempauto_id');
            $table->string('relation');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('d_o_b');
            $table->string('gender');
            $table->string('occupation');
            $table->string('driving_licence');
            $table->string('licence_period');
            $table->string('penalty_points');
            $table->string('points_count');
            $table->string('penalty_reason');
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
        Schema::dropIfExists('drivers');
    }
}
