<?php

namespace App\Modules\Lecture;

use App\Modules\Course\Course;
use App\Slide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }
}
