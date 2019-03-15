<?php

namespace App\Presenter;

use App\Modules\Course\Course;

abstract class Presenter
{
    protected $models;

    abstract function  __construct(int $id = null);

    /**
     * @return Course[]|Course
     */
    abstract function getModels();
}