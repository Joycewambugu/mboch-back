<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Models\JobSeekerReferee::class, function (Faker $faker) {
    return [
        'job_seeker_id' => function(){ 
            return factory(\App\Models\JobSeeker::class)->create()->id; 
        },
        'name' => $faker->name,
        'address' => $faker->city,
        'phone' => $faker->PhoneNumber,
        'confirmed' => $faker->boolean
    ];
});
