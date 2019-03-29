<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Modules\Course\Course;
use App\Modules\Course\CoursePresenter;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CourseController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        /** @var CoursePresenter $coursesPresenter */
        $coursesPresenter = new CoursePresenter();

        /** @var Course[] $courses */
        $courses = $coursesPresenter->getModels();

        return $courses;
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
