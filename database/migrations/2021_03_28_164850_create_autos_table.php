<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('fuel_type');
            $table->string('reg_no');
            $table->string('business_type');
            $table->string('car_commute');
            $table->string('average_drive');
            $table->string('driving_licence');
            $table->string('licence_period');
            $table->string('penalty_points');
            $table->string('points_count');
            $table->string('penalty_reason');
            $table->string('recent_insurance');
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
        Schema::dropIfExists('autos');
    }
}
