<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Models\JobSeekerExperience::class, function (Faker $faker) {
    return [
        'job_seeker_id' => function(){ 
            return factory(\App\Models\JobSeeker::class)->create()->id; 
        },
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'location' => $faker->city,
        'family_type' => $faker->randomElement($array = array ('single parent', 'Nuclear','Extended')),
        'no_of_children' => $faker->randomDigitNotNull,
        'employer_name' => $faker->name,
        'employer_contact' => $faker->PhoneNumber,
        'description' => $faker->text,
    ];
});
