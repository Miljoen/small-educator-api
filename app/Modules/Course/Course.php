<?php

namespace App\Modules\Course;

use App\Modules\Lecture\Lecture;
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

    // ------------------------------------------------------------------------------
    //      Local scopes
    // ------------------------------------------------------------------------------

    public function scopeWithLectures($query)
    {
        return $query->with('lectures');
    }
}
