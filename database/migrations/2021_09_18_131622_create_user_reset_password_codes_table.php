<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResetPasswordCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reset_password_codes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('reset_password_verification_code')->nullable();
            $table->timestamp('reset_password_verification_code_expires_at')->nullable();
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
        Schema::dropIfExists('user_reset_password_codes');
    }
}
