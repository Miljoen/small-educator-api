<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Modules\Course\Course;
use App\Modules\Course\CoursePresenter;
use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        /** @var CoursePresenter $coursesPresenter */
        $coursesPresenter = new CoursePresenter();

        /** @var Course[] $courses */
        $courses = $coursesPresenter->getModels();

        /** @var array $courseArray */
        $coursesArray = ([
            'SmallEducator' => $courses->toArray(),
        ]);

        /** @var ArrayToXml $xmlCourses */
        $xmlCourses = ArrayToXml::convert($coursesArray);

        return response()->xml($xmlCourses);
    }

    public function show(int $id): CourseResource
    {
        /** @var CoursePresenter $coursesPresenter */
        $coursePresenter = new CoursePresenter($id);

        /** @var Course $course */
        $course = $coursePresenter->getModels();

        return $course;
    }
}
