<?php

use App\Modules\Lecture\Lecture;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});
