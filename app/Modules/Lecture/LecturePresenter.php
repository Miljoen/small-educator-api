<?php

namespace App\Modules\Lecture;

use App\Http\Resources\LectureResource;
use App\Presenter\Presenter;
use Illuminate\Support\Collection;

class LecturePresenter extends Presenter
{
    /** @var Collection $models */
    protected $models;

    public function __construct(int $id = null)
    {
        $id ? $this->getLecture($id) : $this->getLectures();
    }

    public function getLectures()
    {
        $this->models = LectureResource::collection(Lecture::with(
            ['slides.question.answers'])->get());
    }

    public function getLecture(int $id)
    {
        $this->models = new LectureResource(Lecture::with(
            ['slides.question.answers'])->find($id));
    }

    /**
     * @return Collection|Lecture
     */
    public function getModels()
    {
        return $this->models;
    }
}