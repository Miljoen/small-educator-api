<?php

use App\Course;
use App\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        foreach ($courses as $course)
        {
            $course->lectures()->saveMany(factory(Lecture::class, 5)->make());
        }
    }
}
