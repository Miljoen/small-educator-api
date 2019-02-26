<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'question_text',
        'multi_select',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function slide(): BelongsTo
    {
        return $this->belongsTo(Slide::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
