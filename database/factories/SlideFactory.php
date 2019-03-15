<?php

use App\Slide;
use Faker\Generator as Faker;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'extra_resource' => $faker->url,
        'order'          => $faker->randomDigit,
    ];
});
