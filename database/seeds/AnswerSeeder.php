<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::all();

        foreach ($questions as $question)
        {
            $answers = factory(Answer::class, rand(3, 4))->make();

            $question->answers()->saveMany($answers);
        }
    }
}
