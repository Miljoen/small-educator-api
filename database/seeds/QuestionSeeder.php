<?php

use App\Question;
use App\Slide;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = Slide::all();

        foreach ($slides as $slide)
        {
            $question = factory(Question::class)->make();
            $question->slide()->associate($slide);
            $question->save();

        }
    }
}
