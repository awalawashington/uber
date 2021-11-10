<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('to');
            $table->double('distance', 8, 2);
            $table->double('price', 8, 2);
            $table->foreign('to')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('taxi_id')->nullable();
            $table->foreign('taxi_id')->references('id')->on('taxis')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('completed')->nullable();
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
        Schema::dropIfExists('rides');
    }
}
