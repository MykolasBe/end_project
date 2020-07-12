<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ApplicationForm;
use Faker\Generator as Faker;

$factory->define(ApplicationForm::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'birth_date' => $faker->date(),
        'location' => $faker->city,
        'education' => $faker->$faker->words(3, true),
        'languages' => $faker->$faker->words(3, true),
    ];
});
