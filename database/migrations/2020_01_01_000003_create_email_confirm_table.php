<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailConfirmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('email_confirms');

        $email = improveRules(config('request.rules.email'));
        $token = improveRules(config('request.rules.token'));

        Schema::create('email_confirm', function (Blueprint $table) use ($email, $token) {
            $table->string('email', $email->max)->index();
            $table->char('token', $token->size);
            $table->timestamp('created_at')->useCurrent();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
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
