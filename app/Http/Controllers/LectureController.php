<?php

namespace App\Http\Controllers;

use App\Lecture;
use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\HttpFoundation\Response;

class LectureController extends Controller
{
    public function index(): Response
    {
        $lectures = Lecture::query()->with('slides')
            ->get();

        $lectureArray = ([
            'SmallEducator' => $lectures->toArray(),
        ]);

        $xmlLectures = ArrayToXml::convert($lectureArray);

        return response()->xml($xmlLectures);
    }

    public function show(int $id): Response
    {
        $lecture = Lecture::where('id', $id)->first();

        $slides = $lecture->slides()->get();
        foreach ($slides as $slide)
        {
            $slide->TextField = $slide->textFields()->get()->toArray();
//            dd($slide);
        }
//        dd($lecture);
//        dd($slides);

        $lecture->Slides = ['TextSlide' => $slides->toArray()];
//        dd($lecture);

        $lectureArray = ([
            'SmallEducator' => $lecture->toArray(),
        ]);

        $xmlLectures = ArrayToXml::convert($lectureArray);

        $xmlLectures = str_replace("<root>","", $xmlLectures);
        $xmlLectures = str_replace("</root>","", $xmlLectures);

        return response()->xml($xmlLectures);
    }
}
