<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\View\View;
use SimpleXMLElement;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::query()->with('lectures')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlCourses = $this->to_xml($xmlElement, $courses->toArray());

        return view('course.index', compact('xmlCourses'));
    }
}
