<?php

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_text' => $faker->sentence . '?',
        'multi_select'  => $faker->boolean,
    ];
});
