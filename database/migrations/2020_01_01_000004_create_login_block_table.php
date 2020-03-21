<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rules = config('request.rules');
        $length['username'] = rules($rules['username'])->max;
        $length['email'] = rules($rules['email'])->max;
        unset($rules);
//        $duration = config('policy.login.block.attemps.duration');
//        $expireIn = date('Y/m/d H:i:s', strtotime('+ 1 second'));

        Schema::create('login_block', function (Blueprint $table) use ($length) {
            $table->unsignedInteger('client_id');
            $table->string('username', $length['username']);
            $table->string('email', $length['email']);
            $table->string('reason');
            $table->timestamp('expired_in');
            $table->timestamp('created_at')->useCurrent();

            $table->index(['client_id', 'username', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_block');
    }
}
