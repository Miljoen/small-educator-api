<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description'
    ];
}
