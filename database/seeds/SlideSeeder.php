<?php

use App\Lecture;
use App\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectures = Lecture::all();

        foreach ($lectures as $lecture)
        {
            $lecture->slides()
                ->saveMany(factory(Slide::class, rand(5, 10))->make());
        }
    }
}
