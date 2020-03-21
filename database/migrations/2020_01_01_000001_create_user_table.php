<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        $rules = config('request.rules');
        $length['username'] =  rules($rules['username'])->max;
        $length['email'] = rules($rules['email'])->max;
        unset($rules);

        $status = improve(config('model.user.status'));

        Schema::create('user', function (Blueprint $table) use ($length, $status) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid')->index();
            $table->unsignedBigInteger('indicator_id')->index()->nullable()->comment('User.id');
            $table->string('username', $length['username'])->unique();
            $table->string('email', $length['email'])->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->enum('status', $status->values())->default($status->first());
            $table->timestamp('active_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('indicator_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

# php artisan db:seed
# php artisan migrate:refresh --seed --drop-views
