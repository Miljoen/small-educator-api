<?php

namespace App\Modules\Course;

use App\Http\Resources\CourseResource;
use App\Presenter\Presenter;
use Illuminate\Support\Collection;

class CoursePresenter extends Presenter
{
    /** @var Collection $models */
    protected $models;

    public function __construct(int $id = null)
    {
        $id ? $this->getCourse($id) : $this->getCourses();
    }

    public function getCourses()
    {
        $this->models = CourseResource::collection(Course::with(
            ['lectures', 'lectures.slides'])->get());
    }

    public function getCourse(int $id)
    {
        $this->models = new CourseResource(Course::with(
            ['lectures', 'lectures.slides'])->find($id));
    }

    /**
     * @return Collection|Course
     */
    function getModels()
    {
        return $this->models;
    }
}