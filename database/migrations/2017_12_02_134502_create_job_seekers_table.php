<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobSeekersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('education_level');
            $table->string('current_location');
            $table->string('tribe');
            $table->string('photo');
            $table->string('national_id');
            $table->integer('experience_years');
            $table->string('spoken_languages');
            $table->string('religion');
            $table->string('employment_status');
            $table->string('marital_status');
            $table->integer('max_children');
            $table->text('health_conditions');
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
        Schema::drop('job_seekers');
    }
}
