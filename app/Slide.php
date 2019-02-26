<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slide extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'extra_resource'
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function backgroundImage(): BelongsTo
    {
        return $this->belongsTo(BackgroundImage::class);
    }
}
