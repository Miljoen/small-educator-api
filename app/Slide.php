<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function question(): HasOne
    {
        return $this->hasOne(Question::class);
    }

    public function backgroundImage(): BelongsTo
    {
        return $this->belongsTo(BackgroundImage::class);
    }

    public function textFields(): BelongsToMany
    {
        return $this->belongsToMany(TextField::class);
    }
}
