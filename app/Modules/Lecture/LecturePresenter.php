<?php

namespace App\Modules\Lecture;

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
        $this->models = Lecture::all();
    }

    public function getLecture(int $id)
    {
        $this->models = Lecture::query()
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * @return Collection|Lecture
     */
    public function getModels()
    {
        return $this->models;
    }

    public function prepareLectureSlides(Lecture $lecture)
    {
        $slides = $lecture->slides()->get();
        foreach ($slides as $slide)
        {
            $slide->TextField = $slide->textFields()->get()->toArray();
        }

        $lecture->Slides = [
            'TextSlide' => $slides->toArray(),
        ];
    }

    public function prepareRootTag(Lecture $lecture, string $rootTag): array
    {
        return [$rootTag => $lecture->toArray()];
    }

    public function prepareXmlResponse(string $xmlLectures): string
    {
        $xmlLectures = str_replace("<root>","", $xmlLectures);
        $xmlLectures = str_replace("</root>","", $xmlLectures);

        return $xmlLectures;
    }
}