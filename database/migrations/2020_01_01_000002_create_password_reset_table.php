<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('password_resets');

        $email = rules(config('request.rules.email'));
        $token = rules(config('request.rules.token'));

        Schema::create('password_reset', function (Blueprint $table) use ($email, $token) {
            $table->string('email', $email->max)->index();
            $table->string('token', $token->size);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset');
    }
}
