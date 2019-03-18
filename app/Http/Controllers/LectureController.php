<?php

namespace App\Http\Controllers;

use App\Modules\Lecture\Lecture;
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
        }

        $lecture->Slides = [
            'TextSlide' => $slides->toArray(),
        ];

        $lectureArray = ([
            'SmallEducator' => $lecture->toArray(),
        ]);

        $xmlLectures = ArrayToXml::convert($lectureArray);

        $xmlResponse = $this->prepareXmlResponse($xmlLectures);

        return response()->xml($xmlResponse);
    }

    protected function prepareXmlResponse(string $xmlLectures): string
    {
        $xmlLectures = str_replace("<root>","", $xmlLectures);
        $xmlLectures = str_replace("</root>","", $xmlLectures);

        return $xmlLectures;
    }
}
