<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();

        return view('courses', ['courses' => $courses]);
    }
}
