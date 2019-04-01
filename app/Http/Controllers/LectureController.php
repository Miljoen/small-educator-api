<?php

namespace App\Http\Controllers;

use App\Http\Resources\LectureResource;
use App\Modules\Lecture\LecturePresenter;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LectureController extends Controller
{
    /*
     * Returns all lectures
     */
    public function index(): AnonymousResourceCollection
    {
        $lecturesPresenter = new LecturePresenter();
        $lectures = $lecturesPresenter->getModels();

        return $lectures;
    }

    /*
     * Returns a specific lecture
     */
    public function show(int $id): LectureResource
    {
        $lecturesPresenter = new LecturePresenter($id);
        $lecture = $lecturesPresenter->getModels();

        return $lecture;
    }
}
