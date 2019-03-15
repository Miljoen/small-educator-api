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
        $lecture = Lecture::where('id', $id)->with('slides')
            ->get();

        $lectureArray = ([
            'SmallEducator' => $lecture->toArray(),
        ]);

        $xmlLectures = ArrayToXml::convert($lectureArray);

        return response()->xml($xmlLectures);
    }
}
