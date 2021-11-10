<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_confirmations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ride_id')->nullable();
            $table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('taxi_id')->nullable();
            $table->foreign('taxi_id')->references('id')->on('taxis')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('confirmation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_confirmations');
    }
}
