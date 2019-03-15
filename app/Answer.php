<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'answer_text',
        'correct_answer',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
