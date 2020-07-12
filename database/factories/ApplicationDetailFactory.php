<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ApplicationDetail;
use Faker\Generator as Faker;

$factory->define(ApplicationDetail::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'requirements' => $faker->text . '|' . $faker->text . '|' . $faker->text,
        'advantages' => $faker->text . '|' . $faker->text . '|' . $faker->text,
        'offer' => $faker->text . '|' . $faker->text . '|' . $faker->text,
    ];
});
