<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CourseSeeder::class);
         $this->call(LectureSeeder::class);
         $this->call(SlideSeeder::class);
         $this->call(QuestionSeeder::class);
         $this->call(AnswerSeeder::class);
         $this->call(TextFieldSeeder::class);
    }
}
