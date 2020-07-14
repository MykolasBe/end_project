<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'birth_date' => $faker->date(),
        'location' => $faker->city,
        'education' => $faker->words(2, true),
        'education_degree' => $faker->numberBetween($min = 0, $max = 3),
        'languages' => $faker->words(2, true),
        'status' => $faker->words(2, true),
        'work_experience' => $faker->numberBetween($min = 0, $max = 1),
        'work_type' => 'part',
    ];
});
