<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Employer::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        // 'email' => $faker->email,
        // 'phone' => $faker->phoneNumber,
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'current_location' => $faker->city,
        'tribe' => $faker->randomElement($array = array ('Dahalo','Digo','Duruma','Edo','El Molo','Embu','Garreh-Ajuran','Giryama','Kalenjin','Kamba','Kikuyu','Kisii','Kuria','Luhya','Luo','Masai','Meru','Mijikenda','Ogiek','Rendille','Samburu','Somali','Swahili','Taita','Teso','Tharaka','Turkana','Yaaku')),
        'spoken_languages' => $faker->word,
        'religion' => $faker->word,
        'family_structure' => $faker->word,
        'house_size' => $faker->word,
        'no_of_children' => $faker->randomDigitNotNull,
        'help_hours' => $faker->word,
        'user_id'=> function(){ 
            return factory(\App\User::class)->create(['user_type'=>'employer'])->id; 
        },
    ];
});
