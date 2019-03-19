<?php

use App\TextField;
use Faker\Generator as Faker;

$factory->define(TextField::class, function (Faker $faker) {
    return [
        'content'    => $faker->sentence,
        'x' => $faker->numberBetween(-200, 200),
        'y' => $faker->numberBetween(-200, 200),
    ];
});
