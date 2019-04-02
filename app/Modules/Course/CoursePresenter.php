<?php

namespace App\Modules\Course;

use App\Presenter\Presenter;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CoursePresenter extends Presenter {
    /** @var Collection $models */
    protected $models;

    public function __construct(int $id = NULL) {
        $id ? $this->getCourse($id) : $this->getCourses();
    }

    public function getCourses() {
        $this->models = Course::query()->withLectures()->get();
    }

    public function getCourse(int $id) {
        $this->models = Course::withLectures()
            ->findOrNew($id);
    }

    public function store(Request $request) {

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new Course($course);
    }

    /**
     * @return Collection|Course
     */
    function getModels() {
        return $this->models;
    }
}
