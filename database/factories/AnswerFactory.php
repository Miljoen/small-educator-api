<?php

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'answer_text'    => $faker->word,
        'correct_answer' => $faker->boolean,
    ];
});
