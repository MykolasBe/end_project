<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobPosition;
use Faker\Generator as Faker;

$factory->define(JobPosition::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'client_description' => $faker->text,
        'description' => json_encode([
            'description' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc.',
            ],
            'requirements' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque.',
            ],
            'advatnages' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam.',
            ],
            'offer' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent.',
            ]
        ]),
        'location' => $faker->city,
        'img' => $faker->imageUrl(),
    ];
});
