<?php

namespace App\Http\Controllers;

use App\Modules\Lecture\Lecture;
use App\Modules\Lecture\LecturePresenter;
use Illuminate\Http\Request;
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
        $lecturePresenter = new LecturePresenter($id);

        $lecturePresenter->prepareLectureSlides(
            $lecturePresenter->getModels()
        );

        $lectureArray = $lecturePresenter->prepareRootTag(
            $lecturePresenter->getModels(),
            'SmallEducator'
        );

        $xmlLectures = ArrayToXml::convert($lectureArray);

        $xmlResponse = $lecturePresenter->prepareXmlResponse($xmlLectures);

        return response()->xml($xmlResponse);
    }
    public function store(Request $request) {

        /** @var LecturePresenter $lecturePresenter */
        $lecturePresenter = new LecturePresenter();

        $lecturePresenter->store($request);

    }
}
