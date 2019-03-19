<?php

use App\Slide;
use App\TextField;
use Illuminate\Database\Seeder;

class TextFieldSeeder extends Seeder
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
            $slide->textFields()
                ->saveMany(factory(TextField::class, rand(2, 3))->make());
        }
    }
}
