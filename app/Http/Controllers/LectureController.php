<?php

namespace App\Http\Controllers;

use App\Modules\Lecture\Lecture;
use App\Modules\Lecture\LecturePresenter;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\HttpFoundation\Response;

class LectureController extends Controller
{
    public function index(): Response
    {
        if ($this->userIsAuthenticated())
        {
            $lectures = Lecture::query()->with('slides')
                ->get();

            $lectureArray = ([
                'SmallEducator' => $lectures->toArray(),
            ]);

            $xmlLectures = ArrayToXml::convert($lectureArray);

            return response()->xml($xmlLectures);
        }

        return response(Auth::UNAUTHENTICATED_MESSAGE);
    }

    public function show(int $id): Response
    {
        if ($this->userIsAuthenticated()) {
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
        return response(Auth::UNAUTHENTICATED_MESSAGE);
    }

    public function userIsAuthenticated(): bool
    {
        return Auth::check();
    }
}
