<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rules = config('request.rules');
        $first_name = improveRules($rules['first_name']);
        $last_name = improveRules($rules['last_name']);
        $avatar = improveRules($rules['avatar']);
        unset($rules);

        $type = improve(config('model.person.type'));

        Schema::create('person', function (Blueprint $table) use ($first_name, $last_name, $avatar, $type) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('user_id')->index()->unique();
            $table->string('first_name', $first_name->max);
            $table->string('last_name', $last_name->max)->nullable();
            $table->string('avatar', $avatar->max)->nullable();
            $table->datetime('birth_date')->nullable();
            $table->enum('type', $type->values())->default($type->first());
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onUpdate('cascade');

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
        Schema::dropIfExists('person');
    }
}
