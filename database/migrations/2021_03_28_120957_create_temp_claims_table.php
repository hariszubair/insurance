<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_claims', function (Blueprint $table) {
            $table->id();
            $table->integer('tempauto_id');
            $table->string('claims_drivers');
            $table->string('d_o_c');
            $table->string('claim_type');
            $table->string('claim_settled');
            $table->string('claim_amount')->nullable();
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
        Schema::dropIfExists('temp_claims');
    }
}
