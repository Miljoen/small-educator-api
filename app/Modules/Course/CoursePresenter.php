<?php

namespace App\Modules\Course;

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
        $this->models = Course::query()->withLectures()->get();
    }

    public function getCourse(int $id)
    {
        $this->models = Course::withLectures()
            ->findOrNew($id);
    }

    /**
     * @return Collection|Course
     */
    function getModels()
    {
        return $this->models;
    }
}