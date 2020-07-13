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
        'education_degree' => $faker->randomDigit,
        'languages' => $faker->words(2, true),
        'status' => $faker->words(2, true),
        'work_experience' => $faker->jobTitle,
        'work_from' => $faker->date(),
        'work_to' => $faker->date(),
    ];
});
