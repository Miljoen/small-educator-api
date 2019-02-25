<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecture extends Model
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

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
