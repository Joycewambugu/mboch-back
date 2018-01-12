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
            $table->integer('user_id')->unique();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('phone')->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('education_level')->nullable();
            $table->string('current_location')->nullable();
            $table->string('tribe')->nullable();
            $table->string('photo')->nullable();
            $table->string('national_id')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('spoken_languages')->nullable();
            $table->string('religion')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('max_children')->nullable();
            $table->text('health_conditions')->nullable();
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
