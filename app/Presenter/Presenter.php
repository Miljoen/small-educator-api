<?php

namespace App\Presenter;

abstract class Presenter
{
    protected $models;

    abstract function  __construct(int $id = null);
}