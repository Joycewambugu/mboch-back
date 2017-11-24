<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SubscriptionPlan::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomDigitNotNull,
        'search_limit' => $faker->randomDigitNotNull
    ];
});
