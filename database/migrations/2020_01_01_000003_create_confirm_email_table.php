<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('email_confirms');

        $email = rules(config('request.rules.email'));
        $token = rules(config('request.rules.token'));

        Schema::create('email_confirm', function (Blueprint $table) use ($email, $token) {
            $table->string('email', $email->max)->index();
            $table->char('token', 60);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_confirm');
    }
}
