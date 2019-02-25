<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'question_text',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function slide(): BelongsTo
    {
        return $this->belongsTo(Slide::class);
    }
}
