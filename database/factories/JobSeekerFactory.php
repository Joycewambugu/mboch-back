<?php

use Faker\Generator as Faker;

$factory->define(App\Models\JobSeeker::class, function (Faker $faker) {
    return [
        'user_id'=> function(){ 
            return factory(\App\User::class)->create(['user_type'=>'job_seeker'])->id; 
        },
        // 'name' => $faker->name,
        // 'email' => $faker->unique()->email,
        // 'phone' => $faker->unique()->PhoneNumber,
        'date_of_birth' => $faker->date,
        'gender' => $faker->randomElement($array = array ('male', 'female')),
        'education_level' =>  $faker->randomElement($array = array ('primary', 'secondary','college','university')),
        'current_location' =>  $faker->city,
        'tribe' =>  $faker->randomElement($array = array ('Dahalo','Digo','Duruma','Edo','El Molo','Embu','Garreh-Ajuran','Giryama','Kalenjin','Kamba','Kikuyu','Kisii','Kuria','Luhya','Luo','Masai','Meru','Mijikenda','Ogiek','Rendille','Samburu','Somali','Swahili','Taita','Teso','Tharaka','Turkana','Yaaku')),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'national_id' => $faker->randomNumber(8),
        'experience_years' => $faker->randomDigitNotNull,
        'spoken_languages' => $faker->word,
        'religion' => $faker->word,
        'employment_status' =>  $faker->randomElement($array = array ('employed', 'searching','suspended')),
        'marital_status' => $faker->randomElement($array = array ('single', 'married','divorced','widowed')),
        'max_children' => $faker->randomDigitNotNull,
        'health_conditions' => $faker->text,
    ];
});
