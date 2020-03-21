<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rules = config('request.rules');
        $zip_code = improveRules($rules['zip_code']);
        $street = improveRules($rules['street']);
        $number = improveRules($rules['number']);
        $sector = improveRules($rules['sector']);
        $complement = improveRules($rules['complement']);
        unset($rules);

        $type = improve(config('model.address.type'));

        Schema::create('address', function (Blueprint $table) use ($zip_code, $street, $number, $sector, $complement, $type) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('person_id')->index();
            $table->unsignedInteger('country')->index()->comment('Geoname Code Country');
            $table->unsignedInteger('state')->index()->comment('Geoname Code State'); #province
            $table->unsignedBigInteger('city')->index()->comment('Geoname Code City');
            $table->string('zip_code', $zip_code->max);
            $table->string('street', $street->max);
            $table->string('number', $number->max);
            $table->string('sector', $sector->max)->nullable();
            $table->string('complement', $complement->max)->nullable();
            $table->enum('type', $type->values())->default($type->first());
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('person')->onUpdate('cascade');

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
        Schema::dropIfExists('address');
    }
}
