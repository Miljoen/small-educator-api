<?php

namespace App\Http\Controllers;

use App\Modules\Course\Course;
use App\Modules\Course\CoursePresenter;
use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        if(CoursePresenter::userIsAuthenticated())
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

        return response(CoursePresenter::UNAUTHENTICATED_MESSAGE);
    }

    public function show(int $id): Response
    {
        if (CoursePresenter::userIsAuthenticated())
        {
            /** @var CoursePresenter $coursesPresenter */
            $coursePresenter = new CoursePresenter($id);

            /** @var Course $course */
            $course = $coursePresenter->getModels();

            /** @var array $courseArray */
            $courseArray = ([
                'SmallEducator' => $course->toArray(),
            ]);

            /** @var ArrayToXml $xmlCourses */
            $xmlCourse = ArrayToXml::convert($courseArray);

            return response()->xml($xmlCourse);
        }

        return response(CoursePresenter::UNAUTHENTICATED_MESSAGE);
    }
}
