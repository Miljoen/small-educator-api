<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slide extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content'
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }
}
