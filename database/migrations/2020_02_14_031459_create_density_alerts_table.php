<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDensityAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('density_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('_id');
            $table->string('master_response_id');
            $table->string('device_alert');
            $table->boolean('open');
            $table->string('lastUpdated');
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
        Schema::dropIfExists('density_alerts');
    }
}
