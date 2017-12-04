<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobSeekerExperiencesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seeker_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->string('family_type');
            $table->integer('no_of_children');
            $table->string('employer_name');
            $table->string('employer_contact');
            $table->text('description')->nullable;
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
        Schema::drop('job_seeker_experiences');
    }
}
