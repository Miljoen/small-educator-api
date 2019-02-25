<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description'
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }
}
