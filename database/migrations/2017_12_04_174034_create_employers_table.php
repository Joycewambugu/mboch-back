<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('current_location')->nullable();
            $table->string('tribe')->nullable();
            $table->string('spoken_languages')->nullable();
            $table->string('religion')->nullable();
            $table->string('family_structure')->nullable();
            $table->string('house_size')->nullable();
            $table->integer('no_of_children')->nullable();
            $table->string('help_hours')->nullable();
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
        Schema::drop('employers');
    }
}
