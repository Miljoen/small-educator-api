<?php

namespace App\Http\Controllers;

use App\Course;
use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        $courses = Course::query()->with('lectures')
            ->get();

        $courseArray = ([
            'SmallEducator' => $courses->toArray(),
        ]);

        $xmlCourses = ArrayToXml::convert($courseArray);

        return response()->xml($xmlCourses);
    }

    public function show(int $id): Response
    {
        $course = Course::where('id', $id)->with('lectures')
            ->get();

        $courseArray = ([
            'SmallEducator' => $course->toArray(),
        ]);

        $xmlCourse = ArrayToXml::convert($courseArray);

        return response()->xml($xmlCourse);
    }
}
