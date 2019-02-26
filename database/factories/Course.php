<?php

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title'       => $faker->title,
        'description' => $faker->sentence,
    ];
});
