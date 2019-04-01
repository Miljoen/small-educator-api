<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Modules\Course\CoursePresenter;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CourseController extends Controller
{
    /*
     * Returns all courses
     */
    public function index(): AnonymousResourceCollection
    {
        $coursesPresenter = new CoursePresenter();
        $courses = $coursesPresenter->getModels();

        return $courses;
    }

    /*
     * Returns a specific course
     */
    public function show(int $id): CourseResource
    {
        $coursePresenter = new CoursePresenter($id);
        $course = $coursePresenter->getModels();

        return $course;
    }
}
